@extends('layouts.auth.signin')

@section('page.title', __('Войти в аккаунт'))

@section('auth.header')
<x-sign.header routeBack="{{ route('auth.signin') }}">
    {{ __('Войти в аккаунт') }}
</x-sign.header>
@endsection

@section('auth.signin')

<x-form.error-first />

<form action={{ route('auth.signin.email.store') }} method="post">
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

    <button class="btn btn-primary py-3 mt-3" type="submit">{{ __('Войти') }}</button>
</form>

<a href="{{ route('auth.help') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle-question"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
    {{ __('Проблемы со входом?') }}
</a>
@endsection
