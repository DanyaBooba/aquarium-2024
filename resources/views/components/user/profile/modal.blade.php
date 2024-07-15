@props([
    'listData' => [[], [], []],
    'listNames' => ['modalSubscribers', 'modalSubscriptions', 'modalAchievements'],
])

@foreach ($listNames as $modal)
    @if (count($listData[$loop->index]) > 0)
        <div class="modal user-modal fade" id="{{ $modal }}" tabindex="-1"
            aria-labelledby="{{ $modal }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        @if ($loop->iteration != 3)
                            <ul class="user-modal-list-people">
                                @foreach ($listData[$loop->index] as $data)
                                    <li>
                                        <a href="{{ route('user.show.id', $data->id) }}">
                                            <x-user.profile.image :avatar="$data->avatar" :avatar-default="$data->avatarDefault" />
                                            <div>
                                                <span>{{ profile_display_name($data->firstName, $data->lastName) }}</span>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="user-modal-list-achivs row row-cols-md-2 gy-3">
                                @foreach ($listData[$loop->index] as $data)
                                    <div class="user-modal-list-achivs__item">
                                        <span>
                                            <img src="{{ asset('/img/user/achivs/achiv-' . $data->id . '.jpg') }}"
                                                alt="{{ __($data->name) }}">
                                        </span>
                                        <x-circle-text.circle-text-simple>
                                            {{ __($data->name) }}
                                        </x-circle-text.circle-text-simple>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
