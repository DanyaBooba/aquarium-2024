@extends('layouts.user.settings')

@section('page.title', 'Настройки')

@section('settings.content')

    <div class="container-settings-main">
        <h1>{{ __('Настройки') }}</h1>

        @unless ($verified)
            <x-user.settings.verified />
        @endunless

        @if ($verified && have_second_account() == false)
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('second.auth.signin') }}" class="settings-devices">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="19" x2="19" y1="8" y2="14" />
                            <line x1="22" x2="16" y1="11" y2="11" />
                        </svg>
                        <span>
                            {{ __('Добавить аккаунт') }}
                        </span>
                    </a>
                </li>
            </ul>
        @elseif(have_second_account())
            <div class="second-account">
                <div class="second-account-profile col-md-10">
                    <a href="{{ route('user.change-account') }}">
                        <x-user.profile.image :avatar="$secondAccount->avatar" :avatar-default="$secondAccount->avatarDefault" />
                        <span class="second-account-profile-text">
                            <span>
                                {{ __('Переключить аккаунт') }}
                            </span>
                            <span class="fs-5">
                                {{ $secondAccount->name }}
                            </span>
                        </span>
                    </a>
                </div>
                <div class="second-account-remove">
                    <a href="{{ route('user.remove-second-account') }}" title="{{ __('Убрать второй аккаунт') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-circle-minus">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12h8" />
                        </svg>
                    </a>
                </div>
            </div>
        @endif

        <ul class="list-group">
            @if ($verified)
                <li class="list-group-item">
                    <a href="{{ route('settings.profile') }}" class="settings-profile">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cog">
                            <path d="M12 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16Z" />
                            <path d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                            <path d="M12 2v2" />
                            <path d="M12 22v-2" />
                            <path d="m17 20.66-1-1.73" />
                            <path d="M11 10.27 7 3.34" />
                            <path d="m20.66 17-1.73-1" />
                            <path d="m3.34 7 1.73 1" />
                            <path d="M14 12h8" />
                            <path d="M2 12h2" />
                            <path d="m20.66 7-1.73 1" />
                            <path d="m3.34 17 1.73-1" />
                            <path d="m17 3.34-1 1.73" />
                            <path d="m11 13.73-4 6.93" />
                        </svg>
                        <span>
                            {{ __('Профиль') }}
                        </span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('settings.notifications') }}" class="settings-notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                        </svg>
                        <span>
                            {{ __('Уведомления') }}
                        </span>
                    </a>
                </li>
            @endif
        </ul>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('settings.appearance') }}" class="settings-personalization">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                        <circle cx="9" cy="9" r="2" />
                        <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                    </svg>
                    <span>
                        {{ __('Персонализация') }}
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('settings.themes') }}" class="settings-devices">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="13.5" cy="6.5" r=".5" fill="currentColor" />
                        <circle cx="17.5" cy="10.5" r=".5" fill="currentColor" />
                        <circle cx="8.5" cy="7.5" r=".5" fill="currentColor" />
                        <circle cx="6.5" cy="12.5" r=".5" fill="currentColor" />
                        <path
                            d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z" />
                    </svg>
                    <span>
                        {{ __('Темы') }}
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('settings.language') }}" class="settings-privacy">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-earth">
                        <path d="M21.54 15H17a2 2 0 0 0-2 2v4.54" />
                        <path
                            d="M7 3.34V5a3 3 0 0 0 3 3v0a2 2 0 0 1 2 2v0c0 1.1.9 2 2 2v0a2 2 0 0 0 2-2v0c0-1.1.9-2 2-2h3.17" />
                        <path d="M11 21.95V18a2 2 0 0 0-2-2v0a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05" />
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    <span>
                        {{ __('Язык') }}
                    </span>
                </a>
            </li>
        </ul>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('main') }}" class="settings-profile">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 22H19C19.5304 22 20.0391 21.7893 20.4142 21.4142C20.7893 21.0391 21 20.5304 21 20V9L12 2L3 9V20C3 20.5304 3.21071 21.0391 3.58579 21.4142C3.96086 21.7893 4.46957 22 5 22H9"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 22V12H15V22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>
                        {{ __('На главную') }}
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.exit') }}" class="settings-notifications">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" x2="9" y1="12" y2="12" />
                    </svg>
                    <span>
                        {{ __('Выйти') }}
                    </span>
                </a>
            </li>
        </ul>
    </div>
@endsection
