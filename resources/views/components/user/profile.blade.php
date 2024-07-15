@props([
    'profile' => (object) [],
    'issub' => false,
    'itsme' => false,
])

<div class="user-profile">
    <x-user.profile.cap-image :cap="$profile->cap" :cap-default="$profile->capDefault" />
    <div class="user-profile-content">
        <div class="user-profile-left">
            <div class="user-profile-image">
                {{-- <x-user.profile.dot :status="$profile->status" /> --}}
                <x-user.profile.image :avatar="$profile->avatar" :avatar-default="$profile->avatarDefault" />
            </div>
            <div class="user-profile-text">
                <p class="user-profile-name" title="{{ $profile->name }}">{{ $profile->name }}</p>
                <p class="user-profile-desc" title="{{ $profile->desc }}">{{ $profile->desc }}</p>
            </div>
        </div>
        <div class="user-profile-right">
            <div title="{{ number_format($profile->subs) }}">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalSubscribers">
                    <p>{{ profile_text_info($profile->subs) }}</p>
                    <p>{{ use_form_word($profile->subs, __('подписчик'), __('подписчика'), __('подписчиков')) }}</p>
                </button>
            </div>
            <div title="{{ number_format($profile->sub) }}">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalSubscriptions">
                    <p>{{ profile_text_info($profile->sub) }}</p>
                    <p>{{ use_form_word($profile->sub, __('подписка'), __('подписки'), __('подписок')) }}</p>
                </button>
            </div>
            <div title="{{ number_format($profile->achivs) }}">
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalAchievements">
                    <p>{{ profile_text_info($profile->achivs) }}</p>
                    <p>{{ use_form_word($profile->achivs, __('достижение'), __('достижения'), __('достижений')) }}</p>
                </button>
            </div>
        </div>
    </div>
    <div class="user-profile-buttons">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrCodeModal">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                <polyline points="16 6 12 2 8 6" />
                <line x1="12" x2="12" y1="2" y2="15" />
            </svg>
            {{ __('Поделиться') }}
        </button>
        @if ($profile->local)
            <button class="user-button-mobile" onClick="buttonOpenURL('{{ route('settings') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
                {{ __('Настройки') }}
            </button>
            <button onClick="buttonOpenURL('{{ route('user.show.id', $profile->id) }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7V5a2 2 0 0 1 2-2h2" />
                    <path d="M17 3h2a2 2 0 0 1 2 2v2" />
                    <path d="M21 17v2a2 2 0 0 1-2 2h-2" />
                    <path d="M7 21H5a2 2 0 0 1-2-2v-2" />
                    <circle cx="12" cy="12" r="1" />
                    <path d="M5 12s2.5-5 7-5 7 5 7 5-2.5 5-7 5-7-5-7-5" />
                </svg>
                {{ __('Профиль со стороны') }}
            </button>
            @if ($profile->verified && have_second_account() == false)
                <button onClick="buttonOpenURL('{{ route('second.auth.signin') }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-plus">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" x2="19" y1="8" y2="14" />
                        <line x1="22" x2="16" y1="11" y2="11" />
                    </svg>
                    {{ __('Добавить аккаунт') }}
                </button>
            @endif
            <button class="user-button-mobile" onClick="buttonOpenURL('{{ route('user.notifications') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                    <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
                </svg>
                {{ __('Уведомления') }}
            </button>
            <button class="user-button-mobile" onClick="buttonOpenURL('{{ route('user.achievements') }}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" />
                    <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" />
                    <path d="M4 22h16" />
                    <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" />
                    <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" />
                    <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z" />
                </svg>
                {{ __('Достижения') }}
            </button>
        @else
            <button onClick="buttonOpenURL('{{ route('user.sub', $profile->id) }}')" {{ $itsme ? 'disabled' : '' }}>
                @if ($issub)
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <polyline points="16 11 18 13 22 9" />
                    </svg>
                    {{ __('Подписан') }}
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <line x1="19" x2="19" y1="8" y2="14" />
                        <line x1="22" x2="16" y1="11" y2="11" />
                    </svg>
                    {{ __('Подписаться') }}
                @endif
            </button>
            <button onClick="buttonOpenURL('{{ route('user.complain', $profile->id) }}')"
                {{ $itsme ? 'disabled' : '' }}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                    <path d="M12 8v4" />
                    <path d="M12 16h.01" />
                </svg>
                {{ __('Пожаловаться') }}
            </button>
        @endif
    </div>
</div>

<x-user.profile.qr-code :nickname="$profile->username" :id="$profile->id" />
