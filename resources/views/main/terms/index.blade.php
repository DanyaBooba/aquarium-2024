@extends('layouts.main.main')

@section('page.title', __('Информация пользователю'))

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/faq/include.css') }}" />
@endpush

@section('main.content')
    <div class="row gx-3">
        <div class="col-3 p-3">
        </div>
        <div class="col-7 p-3">
            <h1>{{ __('Информация пользователю') }}</h1>
            <ul>
                <li>
                    <a href="{{ route('main.terms.privacy') }}">
                        {{ __('Политика конфиденциальности') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('main.terms.termsofuse') }}">
                        {{ __('Условия использования') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('main.terms.cookie') }}">
                        {{ __('Политика обработки файлов cookie') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
