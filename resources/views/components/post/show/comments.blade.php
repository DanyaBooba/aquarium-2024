@props([
    'comments' => [],
])

<p>
    {{ __('Комментариев') }}: {{ count($comments) }}
</p>

@if (count($comments) > 0)
@endif
