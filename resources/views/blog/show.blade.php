@extends('layouts.main.post')

@section('post.content')
    @if ($post->imagecap)
        <img src="{{ asset('img/emoji/heart.png') }}" class="img-fluid">
    @endif

    <h1>
        {{ $post->title }}
    </h1>
    <div>
        {!! $post->content !!}
    </div>
@endsection
