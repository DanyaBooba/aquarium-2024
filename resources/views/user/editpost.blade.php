@extends('layouts.user.addpost')

@section('page.title', __('Изменить пост'))

@section('addpost.content')
    <div class="container-settings-main">
        <div class="editpost-header">
            <a href="{{ route('post.show', [$userId, $post->idPost]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chevron-left">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </a>
            <h1>{{ __('Изменить пост') }} <span class="text-muted">{{ $post->idPost }}</span></h1>
        </div>


        <x-form.error-first />

        <div class="addpost-container">
            <x-addpost.post-change />
            <form action="{{ route('post.edit.store') }}" method="post">
                @csrf
                <input id="x" type="hidden" name="message">
                <input type="hidden" name="idPost" value="{{ $post->idPost }}">
                <trix-editor input="x" placeholder="{{ __('Сообщение') }}">{!! $post->message !!}</trix-editor>
                <button type="submit" class="d-block btn btn-primary mt-3">
                    {{ __('Изменить') }}
                </button>
            </form>
            <button class="btn btn-danger mt-3" onclick="buttonOpenURL('{{ route('post.delete', $post->idPost) }}')">
                {{ __('Удалить пост') }}
            </button>
        </div>
    </div>
@endsection
