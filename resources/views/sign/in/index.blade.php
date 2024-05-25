@extends('layouts.auth.sign')

@section('page.title', __('Вход'))

@section('auth.header')
<x-sign.header>
    {{ __('Вход') }}
</x-sign.header>
@endsection

@section('auth.sign')
{{-- <div class="row row-cols-2 gx-2 mb-0">
    <div id="signin-choose-vk">
        <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signin.vk') }}')">
            <x-sign.vk />
        </button>
    </div>
    <div id="signin-choose-mailru">
        <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signin.mailru') }}')">
            <x-sign.mailru />
        </button>
    </div>
</div> --}}
{{-- <div class="row row-cols-2 gx-2">
    <div id="signin-choose-google">
        <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signin.google') }}')">
            <x-sign.google />
        </button>
    </div>
    <div id="signin-choose-github">
        <button class="btn fs-5" onClick="buttonOpenURL('{{ route('auth.signin.github') }}')">
            <x-sign.github />
        </button>
    </div>
</div> --}}
{{-- discord --}}
<div id="signin-choose-yandex">
    <button class="btn fs-5" onClick="buttonOpenURL('{{ $yandexUri }}')">
        <x-sign.yandex />
    </button>
</div>
<div id="signin-choose-google">
    <button class="btn fs-5" onClick="buttonOpenURL('{{ $googleUri }}')">
        <x-sign.google />
    </button>
</div>
<x-sign.choose-or />
<div id="signin-choose-email">
    <a href="{{ route('auth.signin.email') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
        </svg>
        {{ __('Почта') }}
    </a>
</div>
<div>
    <a href="{{ route('auth.sign.test') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/><path d="M6 8h2"/><path d="M6 12h2"/><path d="M16 8h2"/><path d="M16 12h2"/></svg>
        {{ __('Тестовый аккаунт') }}
    </a>
</div>
<a href="{{ route('auth.signup') }}" class="simple">
    {{ __('Не зарегистрированы?') }}
</a>
@endsection
