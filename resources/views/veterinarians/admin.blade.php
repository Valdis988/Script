@extends('layouts.app')

@section('title', 'Адміністрування ветеринарів')

@section('content')
    <h1>Адміністрування ветеринарів</h1>


    <form method="GET" action="{{ route('veterinarians.admin') }}">
        <label for="name">ПІБ</label>
        <input type="text" id="name" name="name"
               value="{{ request('name') }}" placeholder="Пошук за ПІБ">

        <label for="specialization">Спеціалізація</label>
        <input type="text" id="specialization" name="specialization"
               value="{{ request('specialization') }}" placeholder="Спеціалізація">

        <label for="serviceName">Назва послуги</label>
        <input type="text" id="serviceName" name="serviceName"
               value="{{ request('serviceName') }}" placeholder="Пошук за послугою">

        <label for="service_id">Послуга</label>
        <select id="service_id" name="service_id" onchange="this.form.submit()">
            <option value="">Усі послуги</option>
            @foreach ($services as $id => $name)
                <option value="{{ $id }}" @selected(request('service_id') == $id)>
                    {{ $name }}
                </option>
            @endforeach
        </select>


        <input type="hidden" name="sort" value="{{ request('sort') }}">

        <button type="submit">Застосувати</button>
        <a href="{{ route('veterinarians.admin') }}">Скинути фільтри</a>
    </form>

    @php
        $sortLink = function (string $field, string $label) {
            $current = request('sort');
            $next  = $current === $field ? '-' . $field : $field;
            $arrow = $current === $field
                ? ' ↑'
                : ($current === '-' . $field ? ' ↓' : '');


            $url = route('veterinarians.admin', array_merge(
                request()->except('sort', 'page'),
                ['sort' => $next]
            ));

            return new \Illuminate\Support\HtmlString(
                '<a href="' . e($url) . '">' . e($label) . $arrow . '</a>'
            );
        };
    @endphp

    <table>
        <thead>
        <tr>
            <th>№</th>
            <th>{{ $sortLink('name', 'ПІБ') }}</th>
            <th>Посада</th>
            <th>Спеціалізація</th>
            <th>{{ $sortLink('experience', 'Стаж (років)') }}</th>
            <th>Послуги</th>
            <th>{{ $sortLink('servicesCount', 'Кількість послуг') }}</th>
            <th>{{ $sortLink('minPrice', 'Мін. ціна') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($veterinarians as $i => $vet)
            <tr>
                <td>{{ $veterinarians->firstItem() + $i }}</td>
                <td>{{ $vet->name }}</td>
                <td>{{ $vet->position }}</td>
                <td>{{ $vet->specialization }}</td>
                <td>{{ $vet->experience_years }}</td>
                <td>
                    @forelse ($vet->services as $service)
                        <span class="tag">{{ $service->name ?? 'Послуга #' . $service->id }}</span>
                    @empty
                        —
                    @endforelse
                </td>
                <td>{{ $vet->services_count }}</td>
                <td>{{ $vet->services_min_price ?? '—' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Нічого не знайдено.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $veterinarians->links() }}
@endsection
