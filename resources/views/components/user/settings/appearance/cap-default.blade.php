@props([
    'id' => 0,
    'cap' => '',
])

<div class="col">
    <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg{{ $id }}"
        value="{{ $id }}" onInput="data()" {{ user_settings_active_image_cap($id, $cap) }}>
    <label class="list-group-item" for="bg{{ $id }}">
        <img src="{{ asset("/img/user/bg/BG$id.jpg") }}">
    </label>
</div>
