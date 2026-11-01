<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class StatsController extends Controller
{

    private const GROUPS = [
        'page'       => 'Сторінка',
        'ip'         => 'IP-адреса',
        'method'     => 'HTTP-метод',
        'route_name' => 'Назва маршруту',
        'device'     => 'Пристрій',
    ];


    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');

        if (! array_key_exists($type, self::GROUPS)) {
            abort(400, 'Невідомий тип групування.');
        }

        $rows = Tracker::query()
            ->selectRaw(
                "{$type}, count(*) as hits, count(distinct ip) as visitors, max(visited_at) as last_visit"
            )
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();

        return view('stats.pages', [
            'rows'   => $rows,
            'type'   => $type,
            'labels' => self::GROUPS,
        ]);
    }

    /**
     * Детальна статистика з пагінацією: /stats/detail?type=...&item=...
     */
    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');

        if (! array_key_exists($type, self::GROUPS)) {
            abort(400, 'Невідомий тип фільтрації.');
        }

        $rows = Tracker::query()
            ->when($item, fn ($query, $value) => $query->where($type, $value))
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();

        return view('stats.detail', [
            'rows'   => $rows,
            'type'   => $type,
            'item'   => $item,
            'labels' => self::GROUPS,
        ]);
    }

    /**
     * Додатковий показник проєкту: активність по ветеринарах.
     *  1) найчастіше переглядані картки ветеринарів (meta.object_id);
     *  2) скільки разів використовувався фільтр за посадою (meta.query.position).
     */
    public function veterinarians()
    {
        // 1. Найпопулярніші ветеринари
        $popular = Tracker::query()
            ->selectRaw(
                "json_unquote(json_extract(meta, '$.object_id')) as vet_id,
                 count(*) as views,
                 count(distinct ip) as visitors,
                 max(visited_at) as last_view"
            )
            ->where('route_name', 'veterinarians.show')
            ->where('status', 200)
            ->groupBy('vet_id')
            ->orderByDesc('views')
            ->limit(10)
            ->get();

        // Підтягуємо імена одним запитом (а не по запиту на кожен рядок)
        $vets = Veterinarian::whereIn('id', $popular->pluck('vet_id'))
            ->get()
            ->keyBy('id');

        // 2. Використання фільтра за посадою
        $filters = Tracker::query()
            ->selectRaw(
                "json_unquote(json_extract(meta, '$.query.position')) as filter_value,
                 count(*) as uses,
                 max(visited_at) as last_use"
            )
            ->where('route_name', 'veterinarians.index')
            ->whereRaw("json_extract(meta, '$.query.position') is not null")
            ->groupBy('filter_value')
            ->orderByDesc('uses')
            ->get();

        return view('stats.veterinarians', compact('popular', 'vets', 'filters'));
    }
}
