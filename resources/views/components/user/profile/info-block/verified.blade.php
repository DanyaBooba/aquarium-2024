<x-user.profile.info-block>
    <x-user.profile.info-block.icon.verified />
    <span>
        {{ __('Ваш профиль не видят другие, подтвердите аккаунт через письмо.') }}
    </span>
    <a href="{{ route('user.setverify') }}">
        {{ __('Отправить письмо повторно') }}
    </a>
</x-user.profile.info-block>
