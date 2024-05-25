<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ env("APP_URL") }}/favicon.ico">
    <link rel="icon" type="image/svg+xml" href="{{ env("APP_URL") }}/favicon.svg">
    <link rel="apple-touch-icon" href="{{ env("APP_URL") }}/favicon.svg">
    <link rel="manifest" href="{{ env("APP_URL") }}/manifest.webmanifest">
    <link rel="manifest" href="{{ env("APP_URL") }}/manifest.json">

    <meta name="theme-color" content="#575FCF" />
    <meta name="description" content="{{ env("APP_DESC") }}">
    <meta name="keywords" content="{{ env("APP_KEYWORDS") }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ env("APP_TITLE_SHORT") }}">
    <meta name="twitter:description" content="{{ env("APP_DESC") }}">
    <meta name="twitter:site" content="{{ env("APP_URL") }}">
    <meta name="twitter:image" content="{{ env("APP_URL") }}/favicon.ico">
    <meta name="Author" content="{{ env("APP_AUTHOR") }}">

    <meta property="og:title" content="{{ env("APP_TITLE_SHORT") }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ env("APP_TITLE_SHORT") }}">
    <meta property="og:description" content="{{ env("APP_DESC") }}">
    <meta property="og:url" content="{{ env("APP_URL") }}">
    <meta property="og:image" content="{{ asset('img/logo/cap.jpg') }}">
    {{-- <meta property="og:image:width" content="1456">
    <meta property="og:image:height" content="816"> --}}

    <meta name="googlebot" content="index,follow">
    <meta name="google" content="nositelinkssearchbox">
    {{-- <meta name="format-detection" content="phone=no, address=no"> --}}

    <title>@yield('page.title', config('app.name')) – {{ __('Аквариум') }}</title>

    <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script>
    <script>
        if (matchMedia("(prefers-color-scheme: dark)").media === "not all") {
            document.documentElement.style.display = "none";
            document.head.insertAdjacentHTML(
                "beforeend",
                '<link rel="stylesheet" href="/app/css/light.css" onload="document.documentElement.style.display=\'\'">'
            );
        }
    </script>

    <meta name="color-scheme" content="light dark">
    @stack('meta')

    <link rel="stylesheet" id="css.light" href="{{ asset('css/@@light/theme-' . (session('theme') ? session('theme') : 'default') . '.css') }}" media="(prefers-color-scheme: light)">
    <link rel="stylesheet" id="css.light" href="{{ asset('css/@@light/light.css') }}" media="(prefers-color-scheme: light)">

    <link rel="stylesheet" id="css.dark" href="{{ asset('css/@@dark/theme-' . (session('theme_dark') ? session('theme_dark') : 'default') . '.css') }}" media="(prefers-color-scheme: dark)">
    <link rel="stylesheet" id="css.dark" href="{{ asset('css/@@dark/dark.css') }}" media="(prefers-color-scheme: dark)">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vars.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    @stack('css')

    <x-head.metrix />
</head>
@yield('body')
<script src="{{ asset('js/main/button.js') }}"></script>
<script src="{{ asset('js/page/code.js') }}"></script>
@stack('js')
</html>
