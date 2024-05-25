@extends('layouts.user.user')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/addpost/include.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
<script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endpush

@section('user.content')
<div class="container-addpost">
    <div class="row g-2">
        <div class="container-addpost-left">
            @yield('addpost.content')
        </div>
    </div>
</div>
@endsection
