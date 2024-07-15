@props([
    'post' => (object) [],
    'showUser' => false,
])

@if ($post->haveimage)
    <div class="col col-img">
        @if ($showUser)
            <a href="{{ route('user.show.id', $post->idUser) }}" class="card-overflow">
                <div class="card-overflow__profile">
                    <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                    <span>{{ $post->userName }}</span>
                </div>
            </a>
        @endif
        <a href="{{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}" class="card">
            <img src="{{ asset('img/user/posts/' . $post->idUser . '-' . $post->idPost . '.jpg') }}" class="card-img">
            <div class="card-img-overlay">
                <div class="post">
                    <p>
                        {{ $post->desc }}
                    </p>
                </div>
            </div>
        </a>
    </div>
@else
    <div class="col col-text">
        @if ($showUser)
            <a href="{{ route('user.show.id', $post->idUser) }}" class="card-overflow">
                <div class="card-overflow__profile">
                    <x-user.profile.image :avatar="$post->userAvatar" :avatar-default="$post->userAvatarDefault" />
                    <span>{{ $post->userName }}</span>
                </div>
            </a>
        @endif
        <a href="{{ route('user.post.show.id', [$post->idUser, $post->idPost]) }}" class="card">
            <div class="post">
                <p>
                    {{ $post->desc }}
                </p>
            </div>
        </a>
    </div>
@endif
