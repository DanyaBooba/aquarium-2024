@extends('layouts.main.main')

@section('page.title', 'Скачать приложения')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/include.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/download.css') }}" />
@endpush

@section('main.content')

<div class="page-download">
    <div class="p-3 page-download__container">
        <div class="d-flex align-items-end justify-content-center pb-2 mt-auto" style="margin-top: -10px">
            <a href="{{ route('main') }}" aria-label="{{ __('Перейти в веб-интерфейс') }}" style="margin-right: -100px; margin-top: 80px;">
                <img src="{{ asset('img/main/macbook/macbook-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="600" aria-label="{{ __('Ноутбук со страницей сайта') }}">
            </a>
            <a href="{{ route('main') }}" aria-label="{{ __('Перейти в веб-интерфейс') }}">
                <img src="{{ asset('img/main/iphone-' . (App::isLocale('ru') ? "ru" : "en") . '.png') }}" class="img-fluid" width="210" aria-label="{{ __('Телефон со страницей сайта') }}">
            </a>
        </div>
        <h2>
            Веб-интерфейс
        </h2>
    </div>
</div>

@endsection
