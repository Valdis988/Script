@extends('layouts.app')

@section('title', $veterinarian->name)

@section('content')
    <h1>{{ $veterinarian->name }}</h1>

    <p><strong>Посада:</strong> {{ $veterinarian->position }}</p>
    <p><strong>Спеціалізація:</strong> {{ $veterinarian->specialization }}</p>
    <p><strong>Досвід:</strong> {{ $veterinarian->experience_years }} р.</p>
    <p><strong>Телефон:</strong> {{ $veterinarian->phone ?? 'не вказано' }}</p>

    <p>
        <a href="{{ route('veterinarians.edit', $veterinarian) }}">Редагувати</a>
    </p>

    <form method="POST"
          action="{{ route('veterinarians.destroy', $veterinarian) }}"
          onsubmit="return confirm('Видалити цього ветеринара?')">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>

    <p><a href="{{ route('veterinarians.index') }}">← Повернутися до списку</a></p>
@endsection
