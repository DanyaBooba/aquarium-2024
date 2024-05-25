@extends('layouts.auth.sign')

@section('page.title', __('Помощь со входом'))

@section('auth.header')
<x-sign.header routeBack="{{ route('auth.signin.email') }}">
    {{ __('Помощь со входом') }}
</x-sign.header>
@endsection

@section('auth.sign')
<div>
    <a href="{{ route('auth.restore') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-keyhole-open"><circle cx="12" cy="16" r="1"/><rect width="18" height="12" x="3" y="10" rx="2"/><path d="M7 10V7a5 5 0 0 1 9.33-2.5"/></svg>
        {{ __('Восстановить пароль') }}
    </a>
</div>
<div>
    <a href="{{ route('auth.code') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-binary"><rect x="14" y="14" width="4" height="6" rx="2"/><rect x="6" y="4" width="4" height="6" rx="2"/><path d="M6 20h4"/><path d="M14 10h4"/><path d="M6 14h2v6"/><path d="M14 4h2v6"/></svg>
        {{ __('Войти по коду') }}
    </a>
</div>
@endsection
