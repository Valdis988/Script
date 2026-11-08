@extends('layouts.app')

@section('title', 'Редагування мітки')

@section('content')
    <h1>Редагування мітки</h1>

    <form method="POST"
          action="{{ route('filters.update', $filter) }}">
        @method('PUT')
        @include('filters._form')

        <button type="submit">Зберегти</button>
        <a href="{{ route('filters.index') }}">Скасувати</a>
    </form>
@endsection
