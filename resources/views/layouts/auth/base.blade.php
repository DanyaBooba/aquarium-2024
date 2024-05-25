@extends('layouts.base')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/index.css') }}" />
@endpush

@section('body')
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    @yield('auth.root')
</body>
@endsection

@push('js')
<script src="{{ asset('js/auth/button-password.js') }}"></script>
<script src="{{ asset('js/auth/button-disabled.js') }}"></script>
@endpush
