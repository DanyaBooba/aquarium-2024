@extends('layouts.main.blog')

@section('main.content')
<div class="container container-blog-post">
    <a href="{{ route('blog.index') }}" class="d-flex align-items-center mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left"><path d="m15 18-6-6 6-6"/></svg>
        {{ __('Назад') }}
    </a>
    @yield('post.content')
</div>
@endsection

@push('js')
    <script src="{{ asset('js/page/left-bar-anchors.js') }}"></script>
@endpush
