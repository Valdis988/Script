@extends('layouts.app')

@section('title', 'Послуги ветеринара')

@section('content')
    <h1>Послуги: {{ $veterinarian->name }}</h1>

    <form method="POST"
          action="{{ route('veterinarians.services.update', $veterinarian) }}">
        @csrf
        @method('PUT')

        <label for="vet-services">Оберіть послуги, які виконує ветеринар</label>

        <select id="vet-services" name="services[]" multiple>
            @foreach ($services as $id => $title)
                <option value="{{ $id }}"
                    @selected(in_array($id, old('services', $selected)))>
                    {{ $title }}
                </option>
            @endforeach
        </select>

        @error('services')
        <p class="error">{{ $message }}</p>
        @enderror
        @error('services.*')
        <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Зберегти</button>
        <a href="{{ route('veterinarians.show', $veterinarian) }}">Скасувати</a>
    </form>
@endsection
