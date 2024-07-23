<x-user.profile.info-block>
    <x-user.profile.info-block.icon.lets-subs />
    <span>
        {{ __('Давайте подпишемся на кого-нибудь!') }}
    </span>
    <a href="{{ route('user.search') }}">
        {{ __('Смотреть пользователей') }}
    </a>
</x-user.profile.info-block>
