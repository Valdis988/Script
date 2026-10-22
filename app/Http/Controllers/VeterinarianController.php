<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeterinarianRequest;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianController extends Controller
{
    public function index(Request $request)
    {
        $position = $request->query('position');

        $veterinarians = Veterinarian::query()
            ->when($position, fn ($query) => $query->where('position', $position))
            ->orderBy('name')
            ->paginate(5)
            ->withQueryString();

        $positions = Veterinarian::query()
            ->distinct()
            ->orderBy('position')
            ->pluck('position');

        return view('veterinarians.index', compact('veterinarians', 'positions', 'position'));
    }

    public function create()
    {
        return view('veterinarians.create');
    }

    public function store(VeterinarianRequest $request)
    {
        Veterinarian::create($request->validated());

        return redirect()
            ->route('veterinarians.index')
            ->with('success', 'Ветеринара успішно додано.');
    }

    public function show(Veterinarian $veterinarian)
    {
        return view('veterinarians.show', compact('veterinarian'));
    }

    public function edit(Veterinarian $veterinarian)
    {
        return view('veterinarians.edit', compact('veterinarian'));
    }

    public function update(VeterinarianRequest $request, Veterinarian $veterinarian)
    {
        $veterinarian->update($request->validated());

        return redirect()
            ->route('veterinarians.index')
            ->with('success', 'Дані ветеринара оновлено.');
    }

    public function destroy(Veterinarian $veterinarian)
    {
        $veterinarian->delete();

        return redirect()
            ->route('veterinarians.index')
            ->with('success', 'Ветеринара видалено.');
    }
}
