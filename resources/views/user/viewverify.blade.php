@extends('layouts.auth.sign')

@section('page.title', __('Вход'))

@section('auth.header')
    <x-sign.logo.logo />
    <h1 class="h3">
        Подтвердите почту
    </h1>
@endsection

@section('auth.sign')
    <p class="text-center">
        Чтобы взаимодействовать с пользователями, пройдите по ссылке в письме.
    </p>
    <a href="{{ route('verify.set') }}" class="simple">
        {{ __('Отправить ещё раз?') }}
    </a>
    <a href="{{ route('user.exit.exactly') }}" class="simple">
        {{ __('Выйти из аккаунта?') }}
    </a>
@endsection
