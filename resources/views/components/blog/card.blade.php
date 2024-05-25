@props([
    'id' => 0,
    'title' => ''
])

<a href="{{ route('blog.show', $id) }}" class="blog-post">
    <span class="blog-post-content">
        <h2>{{ $title }}</h2>
        <p>
            {{ __('Читать') }}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </p>
    </span>
</a>
