@extends('layouts.user.addpost')

@section('page.title', __('Импортировать посты'))

@section('addpost.content')
    <div class="container-settings-main">
        <h1>{{ __('Импортировать посты') }}</h1>

        <div class="addpost-container">
            <p>
                {{ __('Импортировать посты.') }}
            </p>
        </div>
    </div>
@endsection
