@extends('layouts.user.user')

@section('page.title', __('Профиль'))

@section('user.alert')

@if($alert = session()->pull('alert.success'))
    <x-user.alert-success :title="$alert" />
@endif

@unless($profile->verified)
<x-user.alert-email />
@endunless

@endsection

@section('user.content')

<x-user.profile :profile="$profile" />

<x-user.profile-me-info :profile="$profile" />

<x-user.profile-posts :posts="$posts" />

@endsection
