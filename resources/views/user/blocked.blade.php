@extends('layouts.auth.sign')

@section('page.title', __('Вход'))

@section('auth.header')
    <x-sign.logo.logo />
    <h1 class="h3">
        Аккаунт заблокирован
    </h1>
@endsection

@section('auth.sign')
    @if ($status == 1)
        <p class="text-center">
            Вами были нарушены <a href="{{ route('main.terms') }}">правила</a> платформы Аквариум, в связи с чем ваш аккаунт
            был заблокирован.
        </p>
        <p class="text-center">
            Получить доступ к аккаунту можно будет через {{ $hours }} час, {{ $min }} мин и
            {{ $sec }} сек
        </p>
    @elseif($status == -1)
        <p class="text-center">
            Вами были нарушены <a href="{{ route('main.terms') }}">правила</a> платформы Аквариум, в связи с чем ваш аккаунт
            был заблокирован навсегда.
        </p>
        <p class="text-center">
            Мы направили всю необходимую информацию на вашу почту.
        </p>
    @endif
    <a href="{{ route('user.exit.exactly') }}" class="simple">
        {{ __('Выйти из аккаунта?') }}
    </a>
@endsection
