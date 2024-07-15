@extends('layouts.main.simple')

@section('page.title', __('История проекта Аквариум'))

@section('simple.content')
<style>
    img {
        border-radius: 8px;
        border: .1rem solid var(--header-border);
    }
</style>

<div class="d-flex justify-content-center mt-5">
    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
</div>
<h1 class="text-center display-3 mt-2">
    {{ __('История проекта Аквариум') }}
</h1>

<div class="container mb-5 px-0" style="max-width: 500px">
    <p class="text-center fs-6" style="line-height: 180%">
        {{ __('Проект Аквариум начал своё существование ещё в 2019 году в виде облачного хранилища данных, после стал развиваться как личный кабинет, а начиная с 2023 года стал известен как социальная платформа.') }}
    </p>
</div>

<h2 class="text-center mt-5 display-6">
    {{ __('Версия 2020-2022 года') }}
</h2>

<figure class="mb-3">
	<img src="{{ asset('img/history/old1-1.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Главная страница.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old1-2.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Страница входа в аккаунт.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old1-5.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Личный кабинет.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old1-3.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Настройка аккаунта.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old1-4.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Страница уведомлений.') }}
    </figcaption>
</figure>

<h2 class="text-center mt-5 display-6">
    {{ __('Межрелизные версии') }}
</h2>

<figure class="mb-3">
	<img src="{{ asset('img/history/old2.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('PHP + RedBeanPHP') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old3.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Laravel 2022') }}
    </figcaption>
</figure>

<h2 class="text-center mt-5 display-6">
    {{ __('Глобальный перезапуск проекта, тестовый интерфейс') }}
</h2>

<figure class="mb-3">
	<img src="{{ asset('img/history/old4-1.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Главная страница.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old4-2.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Лендинг.') }}
    </figcaption>
</figure>

<figure class="mb-3">
	<img src="{{ asset('img/history/old4-3.jpg') }}" class="img-fluid" alt="{{ __('Скриншот старой версии сайта Аквариум') }}">
	<figcaption class="text-center mt-1 text-muted">
        {{ __('Личный кабинет.') }}
    </figcaption>
</figure>
@endsection
