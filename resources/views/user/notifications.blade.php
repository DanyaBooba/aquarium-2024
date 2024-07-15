@extends('layouts.user.user')

@section('page.title', __('Уведомления'))

@section('user.content')

    <h1>
        {{ __('Уведомления') }}
    </h1>
    <div class="user-notifications">
        @if ($count == 0)
            <p>
                {{ __('Уведомлений нет.') }}
            </p>
        @else
            @foreach ($notifications as $item)
                <x-user.notifications.item :i="$loop->iteration" :header="$item->title" :text="$item->message" />
            @endforeach
        @endif
    </div>
@endsection
