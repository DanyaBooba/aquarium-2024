<x-user.profile.info-block>
    <x-user.profile.info-block.icon.test-account />
    <span>
        {{ __('Если зарегистрироваться, можно получить больше возможностей.') }}
    </span>
    <a href="{{ route('auth.sign.test.exit') }}">
        {{ __('Зарегистрироваться') }}
    </a>
</x-user.profile.info-block>
