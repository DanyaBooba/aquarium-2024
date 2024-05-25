@if($capDefault)
<img src="{{ asset(user_cap_image_exist("/img/user/bg/$cap.jpg")) }}" class="user-profile-cap">
@else
<img src="{{ asset(user_cap_image_exist("/$cap.jpg")) }}" class="user-profile-cap">
@endif
