@extends('layouts.user.user')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/settings/include.css') }}" />
@endpush

@section('user.alert')
    @if ($alert = session()->pull('alert.success'))
        <x-user.alert.alert-success :title="$alert" />
    @endif
@endsection

@section('user.content')
    <div class="container-settings">
        <div class="row g-2">
            <div class="container-settings-left">
                @yield('settings.content')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/settings/settings-back.js') }}"></script>
@endpush
