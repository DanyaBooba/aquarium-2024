<?php

function ClearStr($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*'];
    return mb_strtolower(str_replace($chars, '', trim($str)));
}

function ClearNickname($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*', '?', '@', '$', '%', '^', '&', '(', ')', '+'];
    return mb_strtolower(str_replace($chars, '', trim($str)));
}

function CheckDataUser($user)
{
    if (strlen($user["email"]) > 3 && strlen($user["password"]) > 3) return "ok";

    if (strlen($user["email"]) <= 3) return "email_null";

    if (strlen($user["password"]) <= 3) return "passw_null";

    return "error";
}

function RestorePassword($email)
{
    if (strlen($email) <= 3) return "email_null";

    return "ok";
}

function CheckSimplePassword($password)
{
    if ($password == "qwerty" || $password == "1234" || $password == "123456" || $password == "qwerty123" || $password == "abc" || $password == "password" || $password == "pass") {
        return 0;
    }

    return 1;
}
