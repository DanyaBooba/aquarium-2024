@extends('layouts.user.addpost')

@section('page.title', 'Настройки')

@section('addpost.content')
    <div class="container-settings-main">
        <h1>{{ __('Добавить пост') }}</h1>

        <x-form.error-first />

        <div class="addpost-container">
            {{-- <x-addpost.post-import /> --}}
            <form action="{{ route('user.addpost.post') }}" method="post">
                @csrf
                <input id="x" type="hidden" name="message">
                <trix-editor input="x" placeholder="{{ __('Сообщение') }}"></trix-editor>
                <button type="submit" class="btn btn-primary mt-3">
                    {{ __('Опубликовать') }}
                </button>
            </form>
        </div>
    </div>
@endsection
