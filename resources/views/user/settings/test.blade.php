@extends('layouts.user.settings')

@section('settings.content')
<x-settings.header>
    {{ __('jQuery') }}
</x-settings.header>

<p class="text-title">
    {{ __('Сведение') }}
</p>

<x-form.error />

<form action="" onsubmit="sendForm('{{ route('settings') }}')" method="post">
    @csrf
    <div>
        <label for="username" class="form-label">{{ __('Имя пользователя') }}</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="{{ __('К примеру,') }} superman" onInput="data()" value="user10" required>
        <p>
            {{ __('Может содержать только латинские буквы в нижнем регистре.') }}
        </p>
    </div>
    <div>
        <label for="first_name" class="form-label">{{ __('Имя') }}</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="{{ __('Даниил') }}" onInput="data()">
    </div>
    <div>
        <label for="last_name" class="form-label">{{ __('Фамилия') }}</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="{{ __('Иванов') }}" onInput="data()">
    </div>
</form>

<script src="{{ asset('js/user/jquery.js') }}"></script>
<script>
$("form").on("submit", function(){
	// $.ajax({
	// 	url: '/handler.php',
	// 	method: 'post',
	// 	dataType: 'html',
	// 	data: $(this).serialize(),
	// 	success: function(data){
	// 		$('#message').html(data);
	// 	}
    // });
    alert('submit');
	return false;
});
</script>
@endsection
