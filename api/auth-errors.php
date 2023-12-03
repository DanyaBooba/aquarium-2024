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

function LoginByCodeError($data)
{
    if ($data == "email_null") return "Указана неверная почта.";

    if ($data == "code_null") return "Неверный код.";

    if ($data == "error") return "Данные не подходят.";

    return null;
}

function SettingsErrorData($data)
{
    if ($data == "nickname_set") return "Данный никнейм уже занят.";

    if ($data == "error_data") return "Ошибка в данных.";

    if ($data == "error_len") return "Недостаточная длина.";

    return null;
}

function SettingsErrorInfo($data)
{
    if ($data == "desc_error") return "Ошибка в описании.";

    if ($data == "error_data_info") return "Ошибка в данных.";

    return null;
}

function SettingsErrorPass($data)
{
    if ($data == "passw_wrong") return "Ошибка в пароле.";

    if ($data == "passw_another") return "Пароль не подтвержден.";

    if ($data == "passw_null") return "Пароль не подходит.";

    if ($data == "passw_simple") return "Пароль слишком простой.";

    if ($data == "passw_notnew") return "Пароль не новый.";

    return null;
}

function DeleteAccountError($data)
{
    if ($data == "not_correct") return "Пожалуйста, подтвердите удаление.";

    if ($data == "ano_email") return "Введите актуальную почту.";

    if ($data == "ano_pass") return "Неверный пароль.";

    return null;
}

function AddPostError($data)
{
    if ($data == "") return "";

    return null;
}

function ChangeEmailError($data)
{
    if ($data == "") return "";

    return null;
}
