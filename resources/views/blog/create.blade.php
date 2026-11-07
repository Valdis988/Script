@extends('layouts.app')

@section('title', 'Новий запис')

@section('content')
    <h1>Новий запис</h1>

    <form method="POST" action="{{ route('blog.store') }}">
        @csrf

        @include('blog._form')

        <button type="submit">Зберегти</button>
        <a href="{{ route('blog.admin') }}">Скасувати</a>
    </form>
@endsection
