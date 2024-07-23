@extends('layouts.auth.sign')

@section('page.title', __('Добавить аккаунт'))

@section('auth.header')
    <x-sign.header routeClose="{{ route('user') }}">
        {{ __('Добавить аккаунт') }}
    </x-sign.header>
@endsection

@section('auth.sign')

    <x-form.error-first />

    <div id="signin-choose-yandex">
        <button class="btn fs-5" onClick="buttonOpenURL('{{ $yandexUri }}')">
            <x-sign.logo.yandex />
        </button>
    </div>
    <div class="row row-cols-3 gx-2 mb-0">
        <div id="signin-choose-google">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ $vkUri }}')">
                <x-sign.logo.vk />
            </button>
        </div>
        <div id="signin-choose-google">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ $googleUri }}')">
                <x-sign.logo.google />
            </button>
        </div>
        <div id="signin-choose-google">
            <button class="btn fs-5" onClick="buttonOpenURL('{{ $githubUri }}')">
                <x-sign.logo.github />
            </button>
        </div>
    </div>
    <x-sign.choose-or />
    <div id="signin-choose-email">
        <a href="{{ route('second.auth.signin.email') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2" />
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
            </svg>
            {{ __('Почта') }}
        </a>
    </div>
@endsection
