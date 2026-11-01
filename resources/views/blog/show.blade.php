@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <article>
        <h1>{{ $blog->title }}</h1>

        <p class="blog-meta">
            Категорія: {{ $blog->category?->category_name ?? 'Без категорії' }}
            · Автор: {{ $blog->author?->name ?? 'Редакція' }}
            · {{ $blog->dt_created->format('d.m.Y') }}
        </p>

        @if ($blog->description)
            <p><strong>{{ $blog->description }}</strong></p>
        @endif

        <div>{!! nl2br(e($blog->text)) !!}</div>
    </article>


    <p>
        <a href="{{ route('blog.index') }}">← До переліку</a> ·
        <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>
    </p>

    <form method="POST"
          action="{{ route('blog.destroy', $blog) }}"
          onsubmit="return confirm('Видалити запис «{{ $blog->title }}»?')">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>
@endsection
