@extends('layouts.auth.signup')

@section('page.title', __('Регистрация'))

@section('auth.header')
<x-sign.header routeBack="{{ route('auth.signup') }}">
    {{ __('Регистрация') }}
</x-sign.header>
@endsection

@section('auth.signup')
<div id="signin-email">

    <x-form.error-first />

    <form action={{ route('auth.signup.email.store') }} method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
            <label for="email">{{ __('Почта') }}</label>
        </div>
        <div class="input-group input-password" id="password-form1">
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" onInput="checkOnInput()" value="{{ old('password') }}" required>
                <label for="password">{{ __('Пароль') }}</label>
            </div>
            <a class="input-group-text" onClick="changeShowPassword('password-form1')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
            </a>
        </div>

        <div class="form-check text-start mb-3 mt-2">
            <input class="form-check-input" name="agreement" type="checkbox" value="privacy" id="check" onInput="checkOnInput()" checked>
            <label class="form-check-label small" for="check">
                {{ __('Подтверждаете') }}
                <a href="{{ route('main.terms.privacy') }}">
                    {{ __('политику конфиденциальности') }}
                </a>
            </label>
        </div>

        <button class="btn btn-success py-3" type="submit">{{ __('Регистрация') }}</button>
    </form>
</div>
@endsection
