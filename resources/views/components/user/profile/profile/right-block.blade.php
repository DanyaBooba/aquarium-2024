@props([
    'count' => 0,
    'text' => '',
    'modal' => '',
])

@props([
    '_attr' => $count > 0 ? 'data-bs-toggle=modal data-bs-target=#modal' . $modal : '',
])

<div title="{{ number_format($count) }}" {{ $_attr }}>
    <button type="button">
        <p>{{ profile_text_info($count) }}</p>
        <p>{{ $text }}</p>
    </button>
</div>
