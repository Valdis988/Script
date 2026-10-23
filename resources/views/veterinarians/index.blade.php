@extends('layouts.app')

@section('title', 'Наші спеціалісти')

@section('content')
    <h1>Наші спеціалісти</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('veterinarians.index') }}" class="filter">
        <label for="position">Посада:</label>
        <select id="position" name="position" onchange="this.form.submit()">
            <option value="">Усі</option>
            @foreach ($positions as $item)
                <option value="{{ $item }}" @selected($item === $position)>{{ $item }}</option>
            @endforeach
        </select>
        <noscript><button type="submit">Фільтрувати</button></noscript>
        @if ($position)
            <a href="{{ route('veterinarians.index') }}">Скинути</a>
        @endif
    </form>

    <p>
        <a class="btn" href="{{ route('veterinarians.create') }}">Додати ветеринара</a>
    </p>

    <div class="vet-grid">
        @forelse ($veterinarians as $veterinarian)
            <div class="vet-card">
                <h3>
                    <a href="{{ route('veterinarians.show', $veterinarian) }}">
                        {{ $veterinarian->name }}
                    </a>
                </h3>
                <p class="vet-position">{{ $veterinarian->position }}</p>
                <p>Спеціалізація: {{ $veterinarian->specialization }}. Досвід: {{ $veterinarian->experience_years }} р.</p>

                <div class="actions">
                    <a href="{{ route('veterinarians.edit', $veterinarian) }}">Редагувати</a>

                    <form method="POST"
                          action="{{ route('veterinarians.destroy', $veterinarian) }}"
                          onsubmit="return confirm('Видалити цього ветеринара?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Ветеринарів не знайдено.</p>
        @endforelse
    </div>

    {{ $veterinarians->links() }}
@endsection
