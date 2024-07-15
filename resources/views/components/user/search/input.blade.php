<div class="user-search">
    <div class="user-search-input">
        <input class="form-control" type="search" name="search" placeholder="{{ __('Найти') }}..."
            onInput="searchOnInput()">
    </div>
</div>

<div class="user-search-filters">
    <button class="btn" onClick="searchDropFilter()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-filter-x">
            <path d="M13.013 3H2l8 9.46V19l4 2v-8.54l.9-1.055" />
            <path d="m22 3-5 5" />
            <path d="m17 3 5 5" />
        </svg>
        {{ __('Очистить поля') }}
    </button>
</div>
