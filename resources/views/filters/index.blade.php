@extends('layouts.app')

@section('title', 'Мітки')

@section('content')
    <h1>Мітки</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('filters.create') }}">Додати мітку</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Опис</th>
            <th>Записів</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($filters as $filter)
            <tr>
                <td>{{ $filter->filter_id }}</td>
                <td>{{ $filter->filter_name }}</td>
                <td>{{ $filter->filter_description }}</td>
                <td>{{ $filter->blogs_count }}</td>
                <td>
                    <a href="{{ route('filters.edit', $filter) }}">
                        Редагувати
                    </a>
                    <form method="POST"
                          action="{{ route('filters.destroy', $filter) }}"
                          style="display:inline"
                          onsubmit="return confirm('Видалити мітку?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Міток поки немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
