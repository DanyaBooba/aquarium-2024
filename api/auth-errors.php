<?php

function LoginError($data)
{
    if ($data == "email_null") return "Пользователя не существует.";

    if ($data == "passw_null") return "Ошибка в пароле.";

    if ($data == "error") return "Произошла ошибка.";

    return null;
}

function RestoreError($data)
{
    if ($data == "email_null") return "Пользователя не существует.";

    if ($data == "error_url") return "Неверная ссылка для восстановления пароля.";

    if ($data == "time_url") return "Превышено время ожидания.";

    return null;
}

function RegistrationError($data)
{
    if ($data == "nickname_set") return "Никнейм уже используется.";

    if ($data == "nickname_null") return "Никнейм не подходит.";

    if ($data == "email_set") return "Пользователь уже существует.";

    if ($data == "passw_simple") return "Пароль слишком простой.";

    if ($data == "passw_null") return "Пароль не подходит.";

    if ($data == "passw_confirm") return "Пароли не совпадают.";

    if ($data == "confirm") return "Подтвердите политику.";

    if ($data == "error") return "Произошла ошибка.";

    return null;
}

function UpdatePasswordError($data)
{
    if ($data == "passw_confirm") return "Пароли не совпадают.";

    if ($data == "passw_null") return "Пароль не подходит.";

    if ($data == "passw_simple") return "Пароль слишком простой.";

    return null;
}
