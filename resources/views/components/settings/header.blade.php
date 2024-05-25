@props(['route' => route('settings')])

<div class="container container-settings-header">
    <a href="#" onClick="settingsLinkBack('{{ $route }}')" class="header-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
        {{ __('Назад') }}
    </a>
    <div class="header-title">
        <p class="h3">
            {{ $slot }}
        </p>
    </div>
    <a href="#" onClick="sendForm('{{ $route }}')" class="header-confirm">
        {{ __('Готово') }}
    </a>
</div>

<div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Выйти без сохранения?</h3>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="d-flex flex-column">
                    <button type="button" class="btn btn-success w-100" onClick="sendForm('{{ $route }}')">Сохранить</button>
                    <button type="button" class="btn btn-outline-secondary w-100" onClick="sendDiscardForm('{{ $route }}')">Выйти без сохранения</button>
                </div>
            </div>
        </div>
    </div>
</div>
