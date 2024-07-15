@extends('layouts.user.settings')

@section('page.title', __('Настройки языка'))

@section('settings.content')
<x-settings.header>
    {{ __('Язык') }}
</x-settings.header>

<div class="container-settings-main">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="{{ route('main.setlocale', 'ru') }}" class="{{ settings_locale_active_link('ru') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-earth"><path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M7 3.34V5a3 3 0 0 0 3 3v0a2 2 0 0 1 2 2v0c0 1.1.9 2 2 2v0a2 2 0 0 0 2-2v0c0-1.1.9-2 2-2h3.17"/><path d="M11 21.95V18a2 2 0 0 0-2-2v0a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><circle cx="12" cy="12" r="10"/></svg>
                <span>
                    {{ __('Русский') }}
                </span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('main.setlocale', 'en') }}" class="{{ settings_locale_active_link('en') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-earth"><path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"/><path d="M7 3.34V5a3 3 0 0 0 3 3v0a2 2 0 0 1 2 2v0c0 1.1.9 2 2 2v0a2 2 0 0 0 2-2v0c0-1.1.9-2 2-2h3.17"/><path d="M11 21.95V18a2 2 0 0 0-2-2v0a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"/><circle cx="12" cy="12" r="10"/></svg>
                <span>
                    {{ __('Английский') }}
                </span>
            </a>
        </li>
    </ul>
</div>
@endsection
