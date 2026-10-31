@extends('layouts.app')

@section('title', 'Статистика по ветеринарах')

@section('content')
    <h1>Статистика по ветеринарах</h1>

    <p><a href="{{ route('stats.pages') }}">← До загальної статистики</a></p>

    <h2>Найчастіше переглядані спеціалісти</h2>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Ветеринар</th>
            <th>Посада</th>
            <th>Переглядів</th>
            <th>Унікальних IP</th>
            <th>Останній перегляд</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($popular as $i => $row)
            @php($vet = $vets->get($row->vet_id))
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>
                    @if ($vet)
                        <a href="{{ route('veterinarians.show', $vet) }}">{{ $vet->name }}</a>
                    @else
                        <em>видалено (ID {{ $row->vet_id }})</em>
                    @endif
                </td>
                <td>{{ $vet->position ?? '—' }}</td>
                <td>{{ $row->views }}</td>
                <td>{{ $row->visitors }}</td>
                <td>{{ $row->last_view }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Переглядів карток ще не було.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <h2>Використання фільтра за посадою</h2>
    <table>
        <thead>
        <tr>
            <th>Посада</th>
            <th>Використань</th>
            <th>Останнє використання</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($filters as $row)
            <tr>
                <td>{{ $row->filter_value }}</td>
                <td>{{ $row->uses }}</td>
                <td>{{ $row->last_use }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Фільтр ще не використовувався.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
