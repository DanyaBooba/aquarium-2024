@props([
    'routeBack' => '',
    'routeClose' => '',
    'class' => '',
])

<div class="authentication-back">
    @if ($routeBack)
        <a href="{{ $routeBack }}" class="authentication-back-back">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-chevron-left">
                <path d="m15 18-6-6 6-6" />
            </svg>
            {{ __('Назад') }}
        </a>
    @endif
    <a href="{{ $routeClose ? $routeClose : route('main') }}" class="authentication-back-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    </a>
</div>

<x-sign.logo.logo />
<h1 class="h3 {{ $class }}">
    {{ $slot }}
</h1>
