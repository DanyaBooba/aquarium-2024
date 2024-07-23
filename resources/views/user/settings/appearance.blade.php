@extends('layouts.user.settings')

@section('page.title', __('Настройки персонализации'))

@section('settings.content')
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <x-settings.header>
        {{ __('Персонализация') }}
    </x-settings.header>

    <x-form.error-first />

    <p class="text-title">
        {{ __('Загрузить аватарку') }}
    </p>

    <div class="container px-0">
        <div class="mb-4 d-none" id="avatar-upload-block">
            <div id="upload-avatar" style="max-width: 300px"></div>
            <button class="btn btn-success" id="upload-avatar-button"
                style="border-radius: 6px; padding: .75rem 3rem; max-width: 300px; width: 100%">
                {{ __('Сохранить') }}
            </button>
        </div>
        <div class="mb-4" id="avatar-upload-input">
            <div class="col col-load">
                <input type="file" id="upload_avatar" onInput="getAvatar()" class="visually-hidden">
                <label for="upload_avatar" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    {{ __('Загрузить') }}
                </label>
            </div>
        </div>
        <p class="text-muted d-none" id="avatar-upload-empty">
            <i>
                {{ __('Загрузите шапку.') }}
            </i>
        </p>
    </div>

    <p class="d-none text-title mt-4">
        {{ __('Загрузить шапку') }}
    </p>

    <div class="d-none container px-0">
        <div class="mb-4 d-none" id="cap-upload-block">
            <div id="upload-cap" style="max-width: 600px"></div>
            <button class="btn btn-success" id="upload-cap-button"
                style="border-radius: 6px; padding: .75rem 3rem; max-width: 300px; width: 100%">
                {{ __('Сохранить') }}
            </button>
        </div>
        <div class="mb-4" id="cap-upload-input">
            <div class="col col-load">
                <input type="file" id="upload_cap" onInput="getCap()" class="visually-hidden">
                <label for="upload_cap" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12h8" />
                        <path d="M12 8v8" />
                    </svg>
                    {{ __('Загрузить') }}
                </label>
            </div>
        </div>
        <p class="text-muted d-none" id="cap-upload-empty">
            <i>
                {{ __('Загрузите аватарку.') }}
            </i>
        </p>
    </div>

    <p class="text-title mt-4">
        {{ __('Аватарка') }}
    </p>

    <form action="{{ route('settings.appearance.store') }}" onsubmit="sendForm('{{ route('settings') }}')" method="post"
        class="form-settings-image">
        @csrf
        <div class="row row-settings-avatar">
            @for ($i = 1; $i <= 7; $i++)
                <x-user.settings.appearance.avatar-default sex='MAN' :id="$i" :avatar="$profile->avatar" />
            @endfor
        </div>
        <div class="row row-settings-avatar">
            @for ($i = 1; $i <= 7; $i++)
                <x-user.settings.appearance.avatar-default sex='WOMAN' :id="$i" :avatar="$profile->avatar" />
            @endfor
        </div>
        <p class="text-title mt-4">
            {{ __('Шапка') }}
        </p>
        <div class="row row-settings-cap">
            @for ($i = 1; $i <= 11; $i++)
                <x-user.settings.appearance.cap-default :id="$i" :cap="$profile->cap" />
            @endfor
        </div>

        <div class="visually-hidden">
            <button type="submit">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>

@endsection

@push('js')
    <script src="{{ asset('js/settings/load-image.js') }}"></script>
    <script src="{{ asset('js/jquery.croppie.js') }}"></script>
    <script src="{{ asset('js/croppie.js') }}"></script>
    <script src="{{ asset('js/settings/croppie-logic.js') }}"></script>
@endpush
