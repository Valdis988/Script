@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')
    <h1>Детальна статистика</h1>

    <p>
        Фільтр:
        <strong>{{ $labels[$type] ?? $type }}</strong>
        =
        <strong>{{ $item ?? 'усі записи' }}</strong>
        &nbsp;|&nbsp;
        <a href="{{ route('stats.pages', ['type' => $type]) }}">← До зведення</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>Дата і час</th>
            <th>Сторінка</th>
            <th>Метод</th>
            <th>Маршрут</th>
            <th>Пристрій</th>
            <th>IP</th>
            <th>Статус</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>{{ $row->visited_at->format('d.m.Y H:i:s') }}</td>
                <td>{{ $row->page }}</td>
                <td>{{ $row->method }}</td>
                <td>{{ $row->route_name ?? '—' }}</td>
                <td>{{ $row->device }}</td>
                <td>{{ $row->ip }}</td>
                <td>{{ $row->status }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Записів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $rows->links() }}
@endsection
