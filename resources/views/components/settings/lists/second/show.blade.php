@props([
    'avatar' => '',
    'avatarDefault' => '',
    'name' => '',
])

<div class="second-account">
    <div class="second-account-profile col-md-10">
        <a href="{{ route('user.change-account') }}">
            <x-user.profile.image :avatar="$avatar" :avatar-default="$avatarDefault" />
            <span class="second-account-profile-text">
                <span>
                    {{ __('Переключить аккаунт') }}
                </span>
                <span class="fs-5">
                    {{ $name }}
                </span>
            </span>
        </a>
    </div>
    <div class="second-account-remove">
        <a href="{{ route('user.remove-second-account') }}" title="{{ __('Убрать второй аккаунт') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-circle-minus">
                <circle cx="12" cy="12" r="10" />
                <path d="M8 12h8" />
            </svg>
        </a>
    </div>
</div>
