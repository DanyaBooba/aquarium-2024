@extends('layouts.auth.signin')

@section('page.title', __('Восстановить пароль'))

@section('auth.header')
    <x-sign.header routeBack="{{ route('auth.signin.email') }}">
        {{ __('Восстановить пароль') }}
    </x-sign.header>
@endsection

@section('auth.signin')
    <p>
        {{ __('На указанную почту была выслана ссылка для восстановления пароля.') }}
    </p>
@endsection
