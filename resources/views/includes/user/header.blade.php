<header class="container">
    <div class="header__logo">
        <a href="{{ route('user') }}">
            <x-header-logo />
        </a>
    </div>
    <div class="header__meta">
        <div class="header__search">
            <a href="{{ route('user.search') }}" class="{{ header_route_active_link('user.search') }}"
                title="{{ __('Поиск') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-search">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.3-4.3" />
                </svg>
            </a>
        </div>
    </div>
</header>
