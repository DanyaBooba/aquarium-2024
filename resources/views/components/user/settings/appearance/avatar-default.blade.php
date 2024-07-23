@props([
    'sex' => '',
    'id' => 0,
    'avatar' => '',
])

@props([
    '_sex' => in_array($sex, ['MAN', 'WOMAN']) ? $sex : 'MAN',
])

<div class="col">
    <input class="form-check-input visually-hidden" type="radio" name="icon"
        id="icon_{{ $_sex }}_{{ $id }}" value="{{ $_sex }}{{ $id }}" onInput="data()"
        {{ user_settings_active_image_avatar($_sex . $id, $avatar) }}>
    <label class="list-group-item" for="icon_{{ $_sex }}_{{ $id }}">
        <img src="{{ asset("/img/user/logo/$_sex$id.png") }}">
    </label>
</div>
