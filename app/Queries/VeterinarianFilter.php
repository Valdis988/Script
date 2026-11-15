<?php

namespace App\Queries;

use App\Models\Veterinarian;
use Illuminate\Database\Eloquent\Builder;

class VeterinarianFilter
{

    private const SORTABLE = [
        'name'          => 'veterinarians.name',
        'experience'    => 'veterinarians.experience_years',
        'servicesCount' => 'services_count',
        'minPrice'      => 'services_min_price',
    ];

    public function apply(array $input): Builder
    {
        $query = Veterinarian::query()

            ->with(['services.translations'])
            ->withCount('services')
            ->withMin('services', 'price');


        $query->when(
            $input['name'] ?? null,
            fn (Builder $q, $value) =>
                $q->where('veterinarians.name', 'like', "%{$value}%")
        );


        $query->when(
            $input['specialization'] ?? null,
            fn (Builder $q, $value) =>
                $q->where('veterinarians.specialization', 'like', "%{$value}%")
        );


        $query->when(
            $input['serviceName'] ?? null,
            fn (Builder $q, $value) =>
                $q->whereHas(
                    'services.translations',
                    fn (Builder $t) => $t->where('name', 'like', "%{$value}%")
                )
        );


        $query->when(
            $input['service_id'] ?? null,
            fn (Builder $q, $value) =>
                $q->whereHas(
                    'services',
                    fn (Builder $s) => $s->whereKey($value)
                )
        );

        return $this->sort($query, $input['sort'] ?? null);
    }

    private function sort(Builder $query, ?string $sort): Builder
    {
        $desc  = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;


        if (!isset(self::SORTABLE[$field])) {
            return $query->orderBy('veterinarians.name')
                         ->orderBy('veterinarians.id');
        }

        return $query
            ->orderBy(self::SORTABLE[$field], $desc ? 'desc' : 'asc')
            ->orderBy('veterinarians.id');           // стабільний порядок для пагінації
    }
}
