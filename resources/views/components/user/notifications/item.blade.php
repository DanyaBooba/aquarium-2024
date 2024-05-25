@props([
    'i' => 0,
    'header' => '',
    'text' => ''
])

@if($header && $text)
<div class="accordion" id="acc{{ $i }}">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapse{{ $i }}">
                <x-user.notifications.dot />
                {{ $header }}
            </button>
        </h2>
        <div id="collapse{{ $i }}" class="accordion-collapse collapse" data-bs-parent="#acc{{ $i }}">
        <div class="accordion-body">
            {{ $text }}
        </div>
        </div>
    </div>
</div>
@endif
