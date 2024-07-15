@extends('layouts.user.settings')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/posts/include.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fancybox.css') }}" />
    <script src="{{ asset('js/fancybox.js') }}"></script>
@endpush

@section('page.title', __('Пост'))

@section('user.alert')
    @if ($active == 0)
        <x-user.alert.alert :close=false>
            {{ __('Запись находится на модерации') }}
        </x-user.alert.alert>
    @elseif($active == -1)
        <x-user.alert.alert :close=false>
            <div class="text-danger">
                {{ __('Запись не одобрена к публикации') }}
            </div>
        </x-user.alert.alert>
    @endif
@endsection

@section('settings.content')
    <div class="container-post">
        <div class="container-post__main">
            <x-post.show.header :userId="$user->id" :avatar="$user->avatar" :avatarDefault="$user->avatarDefault" :name="profile_display_name($user->firstName, $user->lastName)" />
            @if ($post->haveimage)
                <a data-fancybox="" data-src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}">
                    <span class="post-image">
                        <img src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}"
                            alt="{{ $post->desc }}">
                    </span>
                </a>
            @endif
            <div>
                {!! $post->message !!}
            </div>
        </div>
        <x-post.show.bottom />
        <x-post.show.comments :comments="$comments" />
    </div>
@endsection

@push('js')
    <script>
        Fancybox.bind()
    </script>
@endpush
