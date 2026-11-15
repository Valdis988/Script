<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FilterController extends Controller
{
    public function index()
    {
        $filters = Filter::withCount('blogs')
            ->orderBy('filter_id')
            ->get();

        return view('filters.index', compact('filters'));
    }

    public function create()
    {
        return view('filters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'filter_name' => [
                'required', 'string', 'max:100',
                Rule::unique('filter', 'filter_name'),
            ],
            'filter_description' => ['nullable', 'string'],
        ]);

        Filter::create($data);

        return redirect()
            ->route('filters.index')
            ->with('success', 'Мітку створено.');
    }

    public function edit(Filter $filter)
    {
        return view('filters.edit', compact('filter'));
    }

    public function update(Request $request, Filter $filter)
    {
        $data = $request->validate([
            'filter_name' => [
                'required', 'string', 'max:100',
                Rule::unique('filter', 'filter_name')
                    ->ignore($filter->filter_id, 'filter_id'),
            ],
            'filter_description' => ['nullable', 'string'],
        ]);

        $filter->update($data);

        return redirect()
            ->route('filters.index')
            ->with('success', 'Мітку оновлено.');
    }

    public function destroy(Filter $filter)
    {
        $filter->delete();

        return redirect()
            ->route('filters.index')
            ->with('success', 'Мітку видалено.');
    }
}
