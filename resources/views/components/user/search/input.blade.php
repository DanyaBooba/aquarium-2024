<div class="row gx-3 user-search">
    <div class="col-md-8 user-search-input">
        <input class="form-control" type="search" name="search" placeholder="Найти..." onInput="searchOnInput()">
    </div>
    <div class="col-md-4 user-search-select">
        <select class="form-select" aria-label="Пол" onChange="selectOnInput()">
            <option value="any" selected>Пол: Любой</option>
            <option value="male">Мужской</option>
            <option value="female">Женский</option>
        </select>
    </div>
</div>

<div class="user-search-filters">
    <button class="btn" onClick="searchDropFilter()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-filter-x"><path d="M13.013 3H2l8 9.46V19l4 2v-8.54l.9-1.055"/><path d="m22 3-5 5"/><path d="m17 3 5 5"/></svg>
        {{ __('Очистить поля') }}
    </button>
</div>
