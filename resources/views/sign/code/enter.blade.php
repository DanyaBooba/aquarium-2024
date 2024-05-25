@extends('layouts.auth.signin')

@section('page.title', __('Введите код'))

@section('auth.header')
<x-sign.header>
    {{ __('Введите код') }}
</x-sign.header>
@endsection

@section('auth.signin')

<x-form.error-first />

<form action={{ route('auth.code.enter.store') }} method="post">
    @csrf
    <div class="form-floating">
        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" onInput="checkOnInput()" value="{{ old('email') }}" required autofocus>
        <label for="email">{{ __('Почта') }}</label>
        <p style="color: var(--text-muted); font-size: .875rem; margin-bottom: .5rem;">
            {{ __('Повторите почту, на которую был отправлен код.') }}
        </p>
    </div>

    <div class="form-floating">
        <input type="text" name="code" class="form-control" id="code" placeholder="123456" onInput="checkOnInput()" value="{{ old('code') }}" required>
        <label for="code">{{ __('6-значный код') }}</label>
    </div>

    <button class="btn btn-primary py-3 mt-3" type="submit">{{ __('Войти по коду') }}</button>
</form>

<a href="{{ route('auth.signin.email') }}" class="d-flex justify-content-center mt-4 mb-5 text-decoration-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg>
    {{ __('Вернуться ко входу?') }}
</a>
@endsection
