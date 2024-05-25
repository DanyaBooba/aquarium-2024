@extends('layouts.auth.signin')

@section('page.title', __('Ввести новый пароль'))

@section('auth.header')
<x-sign.header>
    {{ __('Ввести новый пароль') }}
</x-sign.header>
@endsection

@section('auth.signin')

<x-form.error-first />

<form action={{ route('auth.restore.enter.store', $code) }} method="post">
    @csrf
    <div class="input-group input-password" id="password-form1">
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Пароль" onInput="checkOnInput()" required>
            <label for="password">{{ __('Пароль') }}</label>
        </div>
        <a class="input-group-text" onClick="changeShowPassword('password-form1')">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/></svg>
        </a>
    </div>

    <button class="btn btn-primary py-3 mt-3" type="submit">{{ __('Восстановить') }}</button>
</form>

<a href="{{ route('auth.signin.email') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
    {{ __('Вернуться ко входу?') }}
</a>
@endsection
