@extends('layouts.main.main')

@section('page.title', __('Социальная сеть'))

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page/include.css') }}" />
@endpush

@section('main.content')
    <div class="row row-first mb-2 gx-4">
        <div class="row-first-left">
            <div class="p-3">
                <div class="d-flex justify-content-center pb-2 mt-auto" style="margin-top: -10px">
                    <a href="{{ route('main.download') }}" aria-label="{{ __('Скачать для Android') }}"
                        style="margin-right: -30px; margin-top: 10px;">
                        <img src="{{ asset('img/main/android-' . (App::isLocale('ru') ? 'ru' : 'en') . '.png') }}"
                            class="img-fluid" width="200" aria-label="{{ __('Телефон со страницей сайта') }}">
                    </a>
                    <a href="{{ route('main.download') }}" aria-label="{{ __('Скачать для iOS') }}">
                        <img src="{{ asset('img/main/iphone-' . (App::isLocale('ru') ? 'ru' : 'en') . '.png') }}"
                            class="img-fluid" width="210" aria-label="{{ __('Телефон со страницей сайта') }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="row-first-right">
            <div class="p-3">
                <div class="py-3 p-2">
                    <h1 class="mb-4">{!! __('Аквариум — ') !!}<br><i id="js-change">{{ __('удобная') }}</i><br>
                        {!! __('<nobr>социальная сеть</nobr>') !!}</h1>
                </div>
                <div class="row-first-button">
                    <button class="btn btn-light" onClick="buttonOpenURL('{{ route('auth.signin') }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" x2="3" y1="12" y2="12" />
                        </svg>
                        {{ __('Войти') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-second g-4">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4 row-second__content row-second-stickers">
                <a href="{{ route('auth.signup') }}">
                    <img src="{{ asset('img/stickers/sticker1.png') }}" alt="{{ __('Стикер аквариума') }}">
                </a>
                <h3 class="fs-3">{!! __('Стикеры <nobr>за регистрацию</nobr>') !!}</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4 row-second__content row-second-social">
                <a href="{{ route('auth.signin') }}">
                    <img src="{{ asset('img/social/yandex.svg') }}" alt="{{ __('Яндекс') }}">
                </a>
                <h3 class="fs-3">{!! __('Авторизация <nobr>через соцсети</nobr>') !!}</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="p-4 row-second__content row-second-telegram">
                <a href="//aquariumsocial.t.me" target="_blank">
                    <img src="{{ asset('img/social/telegram.svg') }}" alt="{{ __('Телеграм') }}">
                </a>
                <h3 class="fs-3">{!! __('Телеграм-канал проекта') !!}</h3>
            </div>
        </div>
    </div>

    <div class="container container-blog">
        <div class="row row-third row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <img src="{{ asset('img/emoji/partying-face.png') }}" alt="{{ __('Счастливое лицо') }}">
                <h3>{{ __('Удобство') }}</h3>
                <p>{!! __('Для мобильных <nobr>и десктопных</nobr> версий.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/robot.png') }}" alt="{{ __('Робот') }}">
                <h3>{{ __('Безопасность') }}</h3>
                <p>{!! __('Шифрование <nobr>и конфиденциальность</nobr>.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/rocket.png') }}" alt="{{ __('Ракета') }}">
                <h3>{{ __('Скорость') }}</h3>
                <p>{{ __('Быстрая загрузка даже при слабой сети.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/fish.png') }}" alt="{{ __('Рыбка') }}">
                <h3>{{ __('Тематика') }}</h3>
                <p>{{ __('Социальная платформа понравится каждому.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/friends.png') }}" alt="{{ __('Друзья') }}">
                <h3>{{ __('Аудитория') }}</h3>
                <p>{{ __('Большое количество разных интересных людей.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dizzy.png') }}" alt="{{ __('Звезда') }}">
                <h3>{{ __('Лента') }}</h3>
                <p>{!! __('Персональная лента <nobr>с вашими</nobr> подписками.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/heart.png') }}" alt="{{ __('Сердце') }}">
                <h3>{{ __('Эмоции') }}</h3>
                <p>{!! __('Сохраняйте воспоминания <nobr>и делитесь</nobr> <nobr>с друзьями</nobr>.') !!}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/shooting-star.png') }}" alt="{{ __('Падающая звезда') }}">
                <h3>{{ __('Фотографии') }}</h3>
                <p>{{ __('Персонализируйте свою страницу.') }}</p>
            </div>
            <div class="col">
                <img src="{{ asset('img/emoji/dove.png') }}" alt="{{ __('Белый голубь') }}">
                <h3>{{ __('Открытость') }}</h3>
                <p>{!! __('Открытый исходный код <nobr>и API</nobr> для разработчиков.') !!}</p>
            </div>
        </div>
    </div>

    <div class="container container-telegram col-md-10 py-5 my-5" style="border-radius: 24px">
        <div class="text-center">
            <img src="{{ asset('img/social/telegram.svg') }}" alt="{{ __('Телеграм') }}" style="max-width: 100px"
                class="mb-3">
            <h2>{{ __('Телеграм-канал проекта') }}</h2>
            <p class="col-lg-6 mx-auto fs-5 text-muted">
                {{ __('Показываем фотографии дизайна, рассказываем про важные обновления и планы, актуальные новости и обновления проекта.') }}
            </p>
            <div class="d-inline-flex gap-2">
                <button onClick="buttonOpenURL('https://aquariumsocial.t.me')"
                    class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button"
                    style="padding-left: 40px !important">
                    {{ __('Открыть') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="ms-1"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="container container-lightdark">
        <div class="row row-cols-1 row-cols-lg-2 py-5">
            <div class="col text-center container-lightdark__light">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mb-2">
                    <circle cx="12" cy="12" r="4" />
                    <path d="M12 2v2" />
                    <path d="M12 20v2" />
                    <path d="m4.93 4.93 1.41 1.41" />
                    <path d="m17.66 17.66 1.41 1.41" />
                    <path d="M2 12h2" />
                    <path d="M20 12h2" />
                    <path d="m6.34 17.66-1.41 1.41" />
                    <path d="m19.07 4.93-1.41 1.41" />
                </svg>
                <h2>
                    {{ __('Светлая тема') }}
                </h2>
                <div class="container px-0" style="max-width: 250px">
                    <p class="text-center text-muted fs-5">
                        {{ __('Приятные цвета, красивые сочетания и переливы.') }}
                    </p>
                </div>
            </div>
            <div class="col text-center container-lightdark__dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mb-2">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                </svg>
                <h2>
                    {{ __('Темная тема') }}
                </h2>
                <div class="container px-0" style="max-width: 250px">
                    <p class="text-center text-muted fs-5">
                        {{ __('Расчитано для ваших глазок, красивые оттенки цветов.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div
            style="width: 100%; height: 300px; border-radius: 12px 12px 4px 4px; background-image: url('{{ asset('img/main/img/main-aquarium.jpg') }}'); background-size: cover; background-position: center;">
        </div>
        <div class="container px-0">
            <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                <div class="col">
                    <div class="p-3">
                        <h3 class="d-flex align-items-center">
                            <span class="me-2 px-2 pt-1"
                                style="border-radius: 4px; background-color: var(--main-list-item-1)">1.</span>
                            <span>
                                {{ __('Создайте аккаунт') }}
                            </span>
                        </h3>
                        <p class="text-muted">
                            {!! __('Быстрая авторизация через сервисы, <nobr>и удобный</nobr> вход через почту и пароль.') !!}
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <h3 class="d-flex align-items-center">
                            <span class="me-2 px-2 pt-1"
                                style="border-radius: 4px; background-color: var(--main-list-item-2)">2.</span>
                            <span>
                                {{ __('Настройте профиль') }}
                            </span>
                        </h3>
                        <p class="text-muted">
                            {{ __('Выбери свой имя, описание и фото профиля. Меняй профиль по своему желанию.') }}
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3">
                        <h3 class="d-flex align-items-center">
                            <span class="me-2 px-2 pt-1"
                                style="border-radius: 4px; background-color: var(--main-list-item-3)">3.</span>
                            <span>
                                {{ __('Публикации!') }}
                            </span>
                        </h3>
                        <p class="text-muted">
                            {{ __('Смотри профили других людей, подписывайся на них, смотри актуальные публикации и получай достижения за активность.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 py-5 my-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="5" r="1" />
            <path d="m9 20 3-6 3 6" />
            <path d="m6 8 6 2 6-2" />
            <path d="M12 10v4" />
        </svg>
        <h1 class="display-5">
            {{ __('Цифровая доступность') }}
        </h1>
        <div class="col-lg-6 mx-auto">
            <p class="fs-5 text-muted mb-4">
                {{ __('Содержимое сайта доступно для всех людей, даже для тех, у кого наблюдается нарушение работы слуха, зрения, двигательных функций или когнитивных функций.') }}
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button onClick="buttonOpenURL('{{ route('main.accessibility') }}')"
                    class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button"
                    style="padding-left: 40px !important">
                    {{ __('Как это достигается') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="ms-1"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                        <path d="m9 18 6-6-6-6" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="container col-md-10 px-4">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-12 col-lg-6">
                <img src="{{ asset('img/main/img/main-world.jpg') }}" class="d-block img-fluid"
                    alt="{{ __('Воксельный подводный мир') }}" width="700"
                    style="border-radius: 12px; box-shadow: 0 0 .25rem rgba(0, 0, 0, .075) !important;">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 lh-1 mb-3">{!! __('Адаптивный <nobr>веб-дизайн</nobr>') !!}</h2>
                <p class="fs-5 text-muted">
                    {{ __('Сайт адаптирован к возможностям устройств и браузеров, качественный подход в разработке помогает уверенно масштабировать проект и добавлять новые возможности.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 py-5">
            <div class="col text-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mb-2">
                    <path d="M17 21v-2a1 1 0 0 1-1-1v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1a1 1 0 0 1-1 1" />
                    <path d="M19 15V6.5a1 1 0 0 0-7 0v11a1 1 0 0 1-7 0V9" />
                    <path d="M21 21v-2h-4" />
                    <path d="M3 5h4V3" />
                    <path d="M7 5a1 1 0 0 1 1 1v1a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a1 1 0 0 1 1-1V3" />
                </svg>
                <h2>
                    {{ __('Доступ по API') }}
                </h2>
                <div class="container px-0" style="max-width: 300px">
                    <p class="text-center text-muted fs-5">
                        {{ __('Удобное взаимодействие для обмена информацией.') }}
                    </p>
                    <p class="fs-5">
                        <a href="{{ route('main.api') }}" class="d-flex align-items-center justify-content-center">
                            <span>
                                {{ __('Читать') }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col text-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mb-2">
                    <rect width="20" height="8" x="2" y="2" rx="2" ry="2" />
                    <rect width="20" height="8" x="2" y="14" rx="2" ry="2" />
                    <line x1="6" x2="6.01" y1="6" y2="6" />
                    <line x1="6" x2="6.01" y1="18" y2="18" />
                </svg>
                <h2>
                    {{ __('OAuth авторизация') }}
                </h2>
                <div class="container px-0" style="max-width: 250px">
                    <p class="text-center text-muted fs-5">
                        {{ __('Открытый протокол авторизации.') }}
                    </p>
                    <p class="fs-5">
                        <a href="{{ route('main.oauth') }}" class="d-flex align-items-center justify-content-center">
                            <span>
                                {{ __('Читать') }}
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('js/main/js-change-text.js') }}"></script>
@endpush
