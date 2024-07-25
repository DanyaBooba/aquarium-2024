@props([
    'text' => '',
])

<div class="toast-container">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            {{ $text }}
        </div>
    </div>
</div>
