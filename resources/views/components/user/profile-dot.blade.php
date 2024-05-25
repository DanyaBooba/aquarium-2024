@props(['status' => false])

@if($status === "active")
<span class="user-profile-image-point">
    <span class="point-green"></span>
</span>
@elseif($status === "needConfirm")
<span class="user-profile-image-point" title="{{ __('Требуется подтверждение') }}">
    <span class="point-gray"></span>
</span>
@else
<span class="user-profile-image-point" title="{{ __('Неактивен') }}">
    <span class="point-red"></span>
</span>
@endif
