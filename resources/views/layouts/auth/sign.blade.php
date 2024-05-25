@extends('layouts.auth.base')

@section('auth.root')
<main class="form-signin w-100 m-auto">
    <div class="authentication">
        @yield('auth.header')

        <div id="signin-choose">
            <div class="d-flex flex-column">
                @yield('auth.sign')
            </div>
        </div>

        <p class="authentication-text-more">
            © 2020–{{ date('Y') }}
            <a href="{{ route('main') }}" class="text-decoration-none">
                {{ __('Аквариум') }}
            </a>
        </p>
    </div>
</main>
@endsection
