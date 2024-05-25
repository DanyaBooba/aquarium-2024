@extends('layouts.auth.base')

@section('auth.root')
<main class="form-signin w-100 m-auto">
    <div class="authentication">
        <div id="signin-choose">
            <div class="d-flex flex-column text-center">
                <h1 class="display-2 mb-0">
                    @yield('error')
                </h1>
                <p class="fs-4">
                    @yield('message')
                </p>
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
<script src="{{ asset('js/page/go-main.js') }}"></script>
@endpush
