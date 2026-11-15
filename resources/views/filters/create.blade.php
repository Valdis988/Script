@extends('layouts.app')

@section('title', 'Нова мітка')

@section('content')
    <h1>Нова мітка</h1>

    <form method="POST" action="{{ route('filters.store') }}">
        @include('filters._form')

        <button type="submit">Створити</button>
        <a href="{{ route('filters.index') }}">Скасувати</a>
    </form>
@endsection
