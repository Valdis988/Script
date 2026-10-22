@extends('layouts.app')

@section('title', 'Редагування ветеринара')

@section('content')
    <h1>Редагування ветеринара</h1>

    <form method="POST" action="{{ route('veterinarians.update', $veterinarian) }}">
        @csrf
        @method('PUT')
        @include('veterinarians._form')
        <button type="submit">Зберегти зміни</button>
        <a href="{{ route('veterinarians.index') }}">Скасувати</a>
    </form>
@endsection
