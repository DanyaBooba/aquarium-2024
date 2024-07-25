@props([
    'mobile' => false,
    'attr' => '',
    'url' => '',
    'itsme' => false,
])

@props([
    '_mobile' => $mobile ? 'class=user-button-mobile' : '',
    '_disabled' => $itsme ? 'disabled' : '',
    '_onclick' => $url ? 'onclick=buttonOpenURL("' . $url . '")' : '',
])

<button type="button" {{ $_mobile }} {{ $attr }} {{ $_onclick }} {{ $_disabled }}>
    {{ $slot }}
</button>
