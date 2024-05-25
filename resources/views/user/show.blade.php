@extends('layouts.user.user')

@section('page.title', __('Профиль'))

@section('user.alert')
@if($itsme)
<x-user.alert :close=false>
    {{ __('Вы просматриваете свой профиль со стороны') }}
</x-user.alert>
@elseif($profile->usertype === -1)
<x-user.alert :close=false>
    {{ __('Тестовый аккаунт, используется в качестве демонстрации возможностей') }}
</x-user.alert>
@elseif($profile->verified != 1)
<x-user.alert name="verifiedAdmin">
    {{ __('Почта человека не подтверждена, профиль виден из-за того, что вы администратор') }}
</x-user.alert>
@endif
@if($alert = session()->pull('alert.success'))
    <x-user.alert-success :title="$alert" />
@endif
@endsection

@section('user.content')

<x-user.profile :profile="$profile" :issub=$issub :itsme=$itsme />

@endsection
