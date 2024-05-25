@extends('layouts.auth.base')

@section('auth.root')
<main class="form-signup row gx-5 w-100 m-auto align-items-center">
    <div class="col-md-8 form-signup-display">
        <div style="margin-top: 1rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">70</span>
                </span>
                <span class="ms-3" style="margin-top: 1.7rem">{{ __('человек зарегистрировано') }}</span>
            </h4>
        </div>
        <div style="margin-top: 2rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-2" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" x2="3" y1="12" y2="12"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">5&#x2009;000</span>
                </span>
                <span class="ms-3">{!! __('раз<br>заходили в соцсеть') !!}</span>
            </h4>
        </div>
        <div style="margin-top: 2rem">
            <h4 class="d-flex">
                <span class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="me-1" fill="none" stroke="#198754" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><line x1="19" x2="5" y1="5" y2="19"/><circle cx="6.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="17.5" r="2.5"/></svg> <span class="display-5 text-success" style="margin-top: .5rem">80</span>
                </span>
                <span class="ms-3">{!! __('пользователей<br>подтвердили почту') !!}</span>
            </h4>
        </div>
    </div>

    <div class="authentication col-md-4">
        @yield('auth.header')

        @yield('auth.signup')

        <p class="authentication-text-more">
            © 2020–{{ date('Y') }}
            <a href="{{ route('main') }}" class="text-decoration-none">
                {{ __('Аквариум') }}
            </a>
        </p>
    </div>

</main>
@endsection
