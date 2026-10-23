@extends('layouts.app')

@section('title', 'Додати ветеринара')

@section('content')
    <h1>Додати ветеринара</h1>

    <form method="POST" action="{{ route('veterinarians.store') }}">
        @csrf
        @include('veterinarians._form')
        <button type="submit">Зберегти</button>
        <a href="{{ route('veterinarians.index') }}">Скасувати</a>
    </form>
@endsection
