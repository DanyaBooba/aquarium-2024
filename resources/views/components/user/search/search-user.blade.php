<div class="search-users__profile" name="{{ $user->name != __('<безымянный>') ? $user->name : '' }}"
    desc="{{ $user->desc }}" username="{{ $user->username }}">
    <a href="{{ route('user.show.id', $user->id) }}" class="search-users-content">
        <x-user.profile.image :avatar-default="$user->avatarDefault" :avatar="$user->avatar" />
        <div class="search-users-content-data">
            <p class="h5">{{ $user->name }}</p>
            <div class="search-users-content-info">
                <div class="search-users-content-info__block">
                    <div>
                        {{ profile_text_info($user->subs) }}
                    </div>
                    <div>
                        {{ use_form_word($user->subs, __('подписчик'), __('подписчика'), __('подписчиков')) }}
                    </div>
                </div>
                <div class="search-users-content-info__block">
                    <div>
                        {{ profile_text_info($user->sub) }}
                    </div>
                    <div>
                        {{ use_form_word($user->sub, __('подписка'), __('подписки'), __('подписок')) }}
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
