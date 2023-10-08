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
}

function RegistrationError($data)
{
}
