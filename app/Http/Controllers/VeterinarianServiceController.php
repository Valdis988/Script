<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class VeterinarianServiceController extends Controller
{
    public function edit(Veterinarian $veterinarian)
    {
        $veterinarian->load('services');

        $services = Service::with('translations')->get()
            ->mapWithKeys(fn ($s) => [$s->id => $s->title]);

        return view('veterinarians.services', [
            'veterinarian' => $veterinarian,
            'services' => $services,
            'selected' => $veterinarian->services->pluck('id')->all(),
        ]);
    }

    public function update(Request $request, Veterinarian $veterinarian)
    {
        $data = $request->validate([
            'services' => ['sometimes', 'array'],
            'services.*' => ['integer', 'distinct', 'exists:services,id'],
        ]);

        $veterinarian->services()->sync($data['services'] ?? []);

        return redirect()
            ->route('veterinarians.show', $veterinarian)
            ->with('success', 'Перелік послуг оновлено.');
    }
}
