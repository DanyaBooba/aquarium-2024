@extends('layouts.base')

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100" style="padding-top: 6rem">
        @include('includes.alert')
        @include('includes.header')

        <main class="flex-grow-1 py-1">
            <section>
                <div class="container container-blog">
                    @yield('main.content')
                </div>
            </section>
        </main>

        @include('includes.footer')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/page/header.js') }}"></script>
    <script src="{{ asset('js/page/cookie-accept.js') }}"></script>
</body>
@endsection
