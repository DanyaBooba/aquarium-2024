@extends('layouts.main.main')

@section('page.title', __('Брендбук'))

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
            <x-page.title-anchor />
        </div>
        <div class="col-7 p-3">
            <h1>
                {{ __('Брендбук') }}
            </h1>
            <p class="fs-5">
                {{ __('Описание позицирования социальной платформы Аквариум, объяснение концепций, логотип.') }}
            </p>
            <h2>
                {{ __('Скачать логотип') }}
            </h2>
            <ul>
                <li>
                    <a href="{{ asset('file-download/logo_ru.zip') }}" download>
                        {{ __('Скачать RU') }}
                    </a>
                </li>
                <li>
                    <a href="{{ asset('file-download/logo_en.zip') }}" download>
                        {{ __('Скачать EN') }}
                    </a>
                </li>
            </ul>
            <h2>{{ __('Контент') }}</h2>
            <h3>{{ __('Типографика, шрифты, текст') }}</h3>
            <p>
                {{ __('Шрифт обычного текста:') }} <b>Inter</b>, <b>Inter Bold</b>
            </p>
            <p>
                {{ __('Шрифт заголовка: ') }} <b>ResistSans</b>
            </p>
            <div class="p-2 px-3 mb-3" style="border-left: .2rem solid var(--header-border);">
                <p class="p-0 mb-0" style="font-size: 20px">
                    {{ __('Обычный текст, размер') }} 20px
                </p>
                <p class="p-0 mb-0" style="font-size: 16px">
                    {{ __('Обычный текст, размер') }} 16px
                </p>
                <p class="p-0 mb-0" style="font-size: 14px">
                    {{ __('Обычный текст, размер') }} 14px
                </p>
                <p class="p-0 mb-0" style="font-size: 12px">
                    {{ __('Обычный текст, размер') }} 12px
                </p>
            </div>
            <div class="p-2 px-3 mb-3" style="border-left: .2rem solid var(--header-border);">
                <div class="mb-2">
                    <a href="#">
                        {{ __('Ссылка') }}
                    </a>
                </div>
                <button class="btn btn-primary">
                    {{ __('Обычная кнопка') }}
                </button>
            </div>
            <div class="p-2 px-3 mb-3" style="border-left: .2rem solid var(--header-border);">
                <div class="h1">
                    {{ __('Заголовок, размер ') }} 40px
                </div>
                <div class="h2">
                    {{ __('Заголовок, размер ') }} 32px
                </div>
                <div class="h3">
                    {{ __('Заголовок, размер ') }} 28px
                </div>
                <div class="h4">
                    {{ __('Заголовок, размер ') }} 24px
                </div>
                <div class="h5">
                    {{ __('Заголовок, размер ') }} 20px
                </div>
                <div class="h6">
                    {{ __('Заголовок, размер ') }} 16px
                </div>
            </div>
            <h3>{{ __('Скругления') }}</h3>
            <p>
                {{ __('Для контента используется разные скругления:') }} 4px, 8px, 12px, 24px.
            </p>
            <h3>{{ __('Цвета') }}</h3>
            <p>
                {{ __('Актуально для стандартной темы.') }}
            </p>
            <h4>{{ __('В светлой теме') }}</h4>
            <ul>
                <li>{{ __('акцентный цвет') }}: <x-brand.dot color="#575FCF" /></li>
                <li>{{ __('цвет фона') }}: <x-brand.dot color="#f9f9f9" /></li>
                <li>{{ __('цвет текста') }}: <x-brand.dot color="#000" /></li>
                <li>{{ __('цвет неакцентного текста') }}: <x-brand.dot color="#6c757d" /></li>
                <li>{{ __('цвет маркированного текста') }}: <x-brand.dot color="#faf2cd" /></li>
                <li>{{ __('ссылка при наведении') }}: <x-brand.dot color="#0984e3" /></li>
            </ul>
            <h4>{{ __('В тёмной теме') }}</h4>
            <ul>
                <li>{{ __('акцентный цвет') }}: <x-brand.dot color="#8e95ff" /></li>
                <li>{{ __('цвет фона') }}: <x-brand.dot color="#17152b" /></li>
                <li>{{ __('цвет текста') }}: <x-brand.dot color="#fff" /></li>
                <li>{{ __('цвет неакцентного текста') }}: <x-brand.dot color="#6c757d" /></li>
                <li>{{ __('цвет маркированного текста') }}: <x-brand.dot color="#5e5943" /></li>
                <li>{{ __('ссылка при наведении') }}: <x-brand.dot color="#0984e3" /></li>
            </ul>
        </div>
    </div>

    <x-button-top />
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
