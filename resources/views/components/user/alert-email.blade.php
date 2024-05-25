<x-user.alert :close=false
name="email-confirm" >
    {{ __('Подтвердите почту через ссылку в письме') }}
    <a href="{{ route('main.faq') }}#подтверждениепочты" title="Для чего это?">
        <x-user.alert.question />
    </a>
    <a href="{{ route('main.faq') }}#подтверждениепочты" title="Отправить повторно">
        <x-user.alert.new-mail />
    </a>
</x-user.alert>
