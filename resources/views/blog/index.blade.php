@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <h1>Блог</h1>

    <div class="blog-grid">
        @forelse ($blogs as $blog)
            @include('blog._item', ['blog' => $blog])
        @empty
            <p>Записів поки немає.</p>
        @endforelse
    </div>

    <nav class="blog-filters">
        <a href="{{ route('blog.index') }}">
            Усі записи
        </a>
        @foreach ($filters as $id => $name)
            <a href="{{ route('blog.index', ['filter' => $id]) }}">
                {{ $name }}
            </a>
        @endforeach
    </nav>
    {{ $blogs->links() }}
@endsection
