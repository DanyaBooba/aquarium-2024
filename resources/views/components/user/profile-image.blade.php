@if($avatarDefault)
<img src="{{ asset(user_image_exist("/img/user/logo/$avatar.png")) }}">
@else
<img class="user-profile-image-service" src="{{ $avatar }}">
@endif
