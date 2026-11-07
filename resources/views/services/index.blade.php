@extends('layouts.app')

@section('title', app()->getLocale() === 'en' ? 'Services' : 'Послуги')

@section('content')
    <h1>{{ app()->getLocale() === 'en' ? 'Our services' : 'Наші послуги' }}</h1>

    <div class="service-grid">
        @forelse ($services as $service)
            <article class="service-card">
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>

                @if ($service->price)
                    <p class="service-price">
                        {{ app()->getLocale() === 'en' ? 'from' : 'від' }}
                        {{ $service->price }} ₴
                    </p>
                @endif

                @unless ($service->hasTranslation())
                    <small class="muted">
                        {{ app()->getLocale() === 'en'
                            ? 'Shown in the default language'
                            : 'Показано основною мовою' }}
                    </small>
                @endunless
            </article>
        @empty
            <p>{{ app()->getLocale() === 'en' ? 'No services yet.' : 'Послуг поки немає.' }}</p>
        @endforelse
    </div>
@endsection
