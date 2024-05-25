@extends('layouts.main.blog')

@section('page.title', __('Блог'))

@section('main.content')

<x-blog.header />

<div class="row row-blog row-cols-sm-1 row-cols-sm-2 row-cols-lg-3 g-2">
    @if(count($blog) === 0)
    <p class="text-center">
        Пока нет новостей.
    </p>
    @else
        @foreach($blog as $post)
        <x-blog.card :id="$post->id" :title="$post->title" />
        @endforeach
    @endif
</div>

{{-- <x-blog.pagination /> --}}

@endsection
