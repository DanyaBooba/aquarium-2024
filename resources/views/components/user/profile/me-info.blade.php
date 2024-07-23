<div class="profile-info">
    @unless ($profile->verified)
        <x-user.profile.info-block.verified />
    @else
        @if ($profile->usertype == -1)
            <x-user.profile.info-block.test-account />
        @else
            <x-user.profile.info-block.share-link :link="$profile->share" />
        @endif

        @if ($profile->sub == 0)
            <x-user.profile.info-block.lets-subs />
        @endif

        @if ($profile->achivs == 0)
            <x-user.profile.info-block.first-achivs />
        @endif
    @endunless
</div>
