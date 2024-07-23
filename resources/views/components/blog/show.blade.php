@props([
    'blog' => [],
])

@if (count($blog) == 0)
    <p>
        Пока нет новостей.
    </p>
@else
    <div class="row row-blog row-cols-1 row-cols-lg-2 g-3">
        @foreach ($blog as $post)
            <x-blog.card :id="$post->id" :title="$post->title" />
        @endforeach
    </div>
@endif
