@extends('layouts.auth.sign')

@section('page.title', __('Выход из аккаунта'))

@section('auth.header')
<x-sign.header routeClose="{{ route('user') }}">
    {{ __('Выход из аккаунта') }}
</x-sign.header>
@endsection

@section('auth.sign')
<button class="btn btn-danger mb-2 fs-6 py-3" type="submit" onClick="buttonOpenURL('{{ route('user.exit.exactly') }}')">{{ __('Выйти из аккаунта') }}</button>
@endsection
