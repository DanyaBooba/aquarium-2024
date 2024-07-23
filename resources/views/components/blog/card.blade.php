@props([
    'id' => 0,
    'title' => '',
])

<a href="{{ route('blog.show', $id) }}" class="col blog-post">
    <span class="blog-post-content">
        <h2>{{ $title }}</h2>
    </span>
</a>
