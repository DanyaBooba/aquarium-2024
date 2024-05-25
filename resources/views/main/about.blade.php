@extends('layouts.main.simple')

@section('page.title', __('О проекте Аквариум'))

@section('simple.content')
<x-lending.logo />
<p class="text-center mt-4 fs-3">
    {{ __('Социальная сеть с открытым кодом') }}
</p>
<div class="row" style="margin-top: 6rem;">
    <div class="col">
        <p class="display-1">🐠</p>
        <p class="fs-5" style="line-height: 180%">
            {!! __('Аквариум — это место, где вы можете создать свой мир, отражающий вашу личность, интересы <nobr>и уникальность</nobr>.') !!}
        </p>
    </div>
    <div class="col text-center">
        <p class="display-1">🎨</p>
        <p class="fs-5" style="line-height: 180%">
            {!! __('Меняйте свой профиль, используя различные картинки <nobr>и элементы</nobr> дизайна, чтобы создать визуальное представление <nobr>о себе</nobr>.') !!}
        </p>
    </div>
</div>
<div class="row">
    <div class="col">
        <p class="display-1">🥳</p>
        <p class="fs-5" style="line-height: 180%">
            {!! __('Аквариум удобно работает <nobr>в вебе</nobr> <nobr>и на</nobr> мобильных устройствах, доставляя только положительные эмоции.') !!}
        </p>
    </div>
    <div class="col text-center">
        <p class="display-1">👫</p>
        <p class="fs-5" style="line-height: 180%">
            {{ __('В соцсети зарегистрировано более 50-ти человек. И каждый день людей становится все больше.') }}
        </p>
    </div>
</div>
<div style="margin-top: 5rem">
    <h2 class="display-2">{{ __('Цифры') }}</h2>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <svg xmlns="http://www.w3.org/2000/svg"  class="me-2" viewBox="0 0 24 24" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">70</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('человек зарегистрировано') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <svg xmlns="http://www.w3.org/2000/svg"  class="me-2" viewBox="0 0 24 24" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">5&#x2009;000</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('раз заходили в соцсеть') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <svg xmlns="http://www.w3.org/2000/svg"  class="me-1" viewBox="0 0 24 24" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg> <span class="display-3 text-success" style="margin-top: .5rem">80</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('пользователей подтвердили почту') }}</span>
        </h3>
    </div>
</div>
<div style="margin-top: 5rem">
    <h2 class="display-2">{{ __('В 2024 году') }}</h2>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('бета') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('нового интерфейса') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('OAuth') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('для входа и регистрации') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('Лента') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('рекомендаций') }}</span>
        </h3>
    </div>
</div>
<div style="margin-top: 5rem">
    <h2 class="display-2">{{ __('В 2025 году') }}</h2>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('Android') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('приложение') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('iOS') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('приложение') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('API') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('интерфейс') }}</span>
        </h3>
    </div>
    <div style="margin-top: 1rem">
        <h3 class="d-flex flex-wrap">
            <span class="d-flex align-items-center container-simple-numbers">
                <span class="display-3 text-success">{{ __('OAuth') }}</span>
            </span>
            <span class="container-simple-numbers-text">{{ __('авторизация') }}</span>
        </h3>
    </div>
</div>
<div style="margin-top: 6rem; margin-bottom: 4rem">
    <a href="{{ route('main') }}" class="fs-2 text-decoration-none d-flex justify-content-center align-items-center">
        {{ __('Перейти в Аквариум') }}
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="ms-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
    </a>
</div>
@endsection
