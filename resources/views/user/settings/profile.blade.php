@extends('layouts.user.settings')

@section('page.title', 'Настройки профиля')

@section('settings.content')

<x-settings.header>
    {{ __('Профиль') }}
</x-settings.header>

<p class="text-title">
    {{ __('Сведения') }}
</p>

<x-form.error-first />

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">{{ __('Имя пользователя') }}</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="{{ __('К примеру,') }} superman" onInput="data()" value="{{ $profile->username }}">
        <p>
            {{ __('Может содержать только латинские буквы в нижнем регистре и цифры.') }}
        </p>
    </div>
    <div>
        <label for="desc" class="form-label">{{ __('Описание') }}</label>
        <input type="text" name="desc" class="form-control" id="desc" value="{{ $profile->desc }}" placeholder="{{ __('Пару слов о вас') }}" onInput="data()">
        <p>
            {{ __('Краткая информация о вас, к примеру возраст, город проживания, сфера деятельности.') }}
        </p>
    </div>
    <div>
        <label for="firstName" class="form-label">{{ __('Имя') }}</label>
        <input type="text" name="firstName" class="form-control" id="firstName" value="{{ $profile->firstName }}" placeholder="{{ __('Даниил') }}" onInput="data()">
    </div>
    <div>
        <label for="lastName" class="form-label">{{ __('Фамилия') }}</label>
        <input type="text" name="lastName" class="form-control" id="lastName" value="{{ $profile->lastName }}" placeholder="{{ __('Иванов') }}" onInput="data()">
    </div>

    <div class="visually-hidden">
        <button type="submit">
            {{ __('Сохранить') }}
        </button>
    </div>
</form>

<p class="text-title">
{{ __('Восстановить доступ') }}
</p>

<div class="container-settings-main">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('settings.profile.password') }}">
                <span>
                    {{ __('Сменить пароль') }}
                </span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('settings.profile.email') }}">
                <span>
                    {{ __('Сменить почту') }}
                </span>
            </a>
        </li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('user.delete') }}">
                <span class="text-danger">
                    {{ __('Удалить аккаунт') }}
                </span>
            </a>
        </li>
    </ul>
</div>
@endsection
