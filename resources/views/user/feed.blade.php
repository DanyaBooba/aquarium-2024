@extends('layouts.user.user')

@section('page.title', __('Лента'))

@section('user.content')
    <div class="posts container">
        <h1>
            {{ __('Записи пользователей') }}
        </h1>
        <div class="">

        </div>
        <x-post.show :posts="$posts" :showUser="true" />
    </div>
@endsection
