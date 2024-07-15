<x-user.alert.alert :close=false name="email-confirm">
    {{ __('Подтвердите почту через ссылку в письме') }}
    <a href="{{ route('main.faq') }}#подтверждениепочты" title="Для чего это?">
        <x-user.alert.alert.question />
    </a>
    <a href="{{ route('main.faq') }}#подтверждениепочты" title="Отправить повторно">
        <x-user.alert.alert.new-mail />
    </a>
</x-user.alert.alert>
