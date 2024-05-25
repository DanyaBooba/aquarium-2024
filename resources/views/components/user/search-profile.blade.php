<div class="search-users__profile"
    name="{{ $user->name }}"
    desc="{{ $user->desc }}"
    username="{{ $user->username }}"
    sex="{{ $user->male ? "male" : "female" }}">
    <a href="{{ route('user.show.id', $user->id) }}" class="search-users-content">
        <x-user.profile-image
            :avatar-default="$user->avatarDefault"
            :avatar="$user->avatar"
        />
        <p class="h5 mb-4">
            {{ $user->name }}
        </p>
    </a>
</div>
