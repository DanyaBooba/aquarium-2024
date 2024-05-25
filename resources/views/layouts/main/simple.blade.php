@extends('layouts.base')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simple/include.css') }}" />
@endpush

@section('body')
<body>
    <div class="d-flex flex-column justify-content-between min-vh-100">
        <main class="flex-grow-1 py-1">
            <section>
                <div class="container container-simple mt-2">
                    @yield('simple.content')
                </div>
            </section>
        </main>

        @include('includes.footer')
    </div>

    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
@endsection
