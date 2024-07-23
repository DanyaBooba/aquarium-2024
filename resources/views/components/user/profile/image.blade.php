@props([
    'avatarDefault' => false,
    'avatar' => '',
])

@if ($avatarDefault)
    <img src="{{ asset(user_image_exist("/img/user/logo/$avatar.png")) }}">
@else
    <img src="{{ $avatar }}" class="user-profile-image-service">
@endif
