@props([
    'posts' => [],
    'empty' => 'Нет постов.',
    'showUser' => false,
])

@if (count($posts) == 0)
    <p>{{ $empty }}</p>
@else
    <div class="row row-cols-1 row-cols-lg-2 gx-3">
        @foreach ($posts as $post)
            <x-post.card :post="$post" :showUser="$showUser" />
        @endforeach
    </div>
@endif
