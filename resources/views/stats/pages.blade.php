@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')
    <h1>Статистика відвідувань</h1>

    <p>
        Групувати за:
        @foreach ($labels as $key => $label)
            @if ($key === $type)
                <strong>{{ $label }}</strong>
            @else
                <a href="{{ route('stats.pages', ['type' => $key]) }}">{{ $label }}</a>
            @endif
            @if (! $loop->last) | @endif
        @endforeach
    </p>

    <p>
        <a href="{{ route('stats.veterinarians') }}">Статистика по ветеринарах →</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>{{ $labels[$type] }}</th>
            <th>Звернень</th>
            <th>Унікальних IP</th>
            <th>Останній візит</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
                    @if ($row->{$type} !== null)
                        <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}">
                            {{ $row->{$type} }}
                        </a>
                    @else
                        — (маршрут без назви)
                    @endif
                </td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->visitors }}</td>
                <td>{{ $row->last_visit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Даних ще немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
