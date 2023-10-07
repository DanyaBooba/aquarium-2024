<?php

function ClearStr($str)
{
    $chars = ['!', '#', '<', '>', '«', '»'];
    return mb_strtolower(str_replace($chars, '', trim($str)));
}

function CheckDataUser($user)
{
    if (strlen($user["email"]) > 3 && strlen($user["password"]) > 3) return "ok";

    if (strlen($user["email"]) <= 3) return "email_null";

    if (strlen($user["password"]) <= 3) return "passw_null";

    return "error";
}
