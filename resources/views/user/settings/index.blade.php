@extends('layouts.user.settings')

@section('page.title', 'Настройки')

@section('settings.content')
    <div class="container-settings-main">
        <h1>{{ __('Настройки') }}</h1>

        @if ($verified && have_second_account() == false)
            <x-settings.lists.second.add />
        @elseif(have_second_account())
            <x-settings.lists.second.show :avatar="$secondAccount->avatar" :avatarDefault="$secondAccount->avatarDefault" :name="$secondAccount->name" />
        @endif

        <x-settings.lists.list>
            <x-settings.lists.item route="{{ route('settings.profile') }}" class="profile" text="{{ __('Профиль') }}">
                <x-settings.lists.icons.profile />
            </x-settings.lists.item>
            {{-- <x-settings.lists.item route="{{ route('settings.session') }}" class="session" text="{{ __('Сессии') }}">
                <x-settings.lists.icons.session />
            </x-settings.lists.item> --}}
            <x-settings.lists.item route="{{ route('settings.notifications') }}" class="notifications"
                text="{{ __('Уведомления') }}">
                <x-settings.lists.icons.notifications />
            </x-settings.lists.item>
        </x-settings.lists.list>

        <x-settings.lists.list>
            <x-settings.lists.item route="{{ route('settings.appearance') }}" class="personalization"
                text="{{ __('Персонализация') }}">
                <x-settings.lists.icons.appearance />
            </x-settings.lists.item>
            <x-settings.lists.item route="{{ route('settings.themes') }}" class="devices" text="{{ __('Темы') }}">
                <x-settings.lists.icons.themes />
            </x-settings.lists.item>
            <x-settings.lists.item route="{{ route('settings.language') }}" class="privacy" text="{{ __('Язык') }}">
                <x-settings.lists.icons.language />
            </x-settings.lists.item>
        </x-settings.lists.list>

        <x-settings.lists.list>
            <x-settings.lists.item route="{{ route('main') }}" class="home" text="{{ __('На главную') }}">
                <x-settings.lists.icons.home />
            </x-settings.lists.item>
            <x-settings.lists.item route="{{ route('user.exit') }}" class="exit" text="{{ __('Выйти') }}">
                <x-settings.lists.icons.exit />
            </x-settings.lists.item>
        </x-settings.lists.list>
    </div>
@endsection
