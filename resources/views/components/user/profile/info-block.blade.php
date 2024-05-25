@props(['svg' => ''])

<div class="profile-info__item">
    <div class="profile-info__container">
        {!! $svg !!}
        {{ $slot }}
    </div>
</div>
