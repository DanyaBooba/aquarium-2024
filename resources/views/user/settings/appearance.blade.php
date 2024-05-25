@extends('layouts.user.settings')

@section('page.title', __('Настройки персонализации'))

@section('settings.content')
<x-settings.header>
    {{ __('Персонализация') }}
</x-settings.header>

<x-form.error-first />

<form action="{{ route('settings.appearance.loadfile') }}" method="post" enctype="multipart/form-data" class="mb-4">
    @csrf

    <p class="text-title">
        Загрузка изображения
    </p>

    <input type="file" name="image">

    <button type="submit" class="btn btn-primary">
        Отправить форму
    </button>
</form>

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post" class="form-settings-image">
    @csrf
    <p class="text-title">
        {{ __('Аватарка') }}
    </p>
    <div class="row row-settings-avatar">
        @for($i = 1; $i <= 7; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon{{ $i }}" value="{{ $i }}" onInput="data()" {{ user_settings_active_image_avatar($i, $profile->avatar) }}>
            <label class="list-group-item" for="icon{{ $i }}">
                <img src="{{ asset("/img/user/logo/MAN$i.png") }}">
            </label>
        </div>
        @endfor
        @if($profile->avatarDefault == false)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon{{ $i + 1 }}" value="0" onInput="data()" checked>
            <label class="list-group-item list-group-item-another" for="icon{{ $i + 1 }}">
                <img src="{{ $profile->avatar }}">
            </label>
        </div>
        @endif
        <div class="col">
            <button class="form-check-input" onInput="data()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                <p>
                    Загрузить
                </p>
            </button>
        </div>
    </div>
    <p class="text-title">
        {{ __('Шапка') }}
    </p>
    <div class="row row-settings-cap">
        @for($i = 1; $i <= 11; $i++)
        <div class="col">
            <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg{{ $i }}" value="{{ $i }}" onInput="data()" {{ user_settings_active_image_cap($i, $profile->cap) }}>
            <label class="list-group-item" for="bg{{ $i }}">
                <img src="{{ asset("/img/user/bg/BG$i.jpg") }}">
            </label>
        </div>
        @endfor
    </div>

    <div class="visually-hidden">
        <button type="submit">
            {{ __('Сохранить') }}
        </button>
    </div>
</form>

@endsection
