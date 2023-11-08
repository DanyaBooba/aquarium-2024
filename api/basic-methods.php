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
        return 1;
    }

    return 0;
}

function SqlRequestCreate($user)
{
    $login = [
        0 => [
            "name" => "email",
            "value" => $user["email"],
        ],
        1 => [
            "name" => "emailverify",
            "value" => 0,
        ],
        2 => [
            "name" => "passhash",
            "value" => password_hash($user["password"], PASSWORD_DEFAULT),
        ],
        3 => [
            "name" => "nickname",
            "value" => "user" . time(),
        ],
        4 => [
            "name" => "firstName",
            "value" => "empty",
        ],
        5 => [
            "name" => "lastName",
            "value" => "empty",
        ],
        6 => [
            "name" => "datereg",
            "value" => time(),
        ],
        7 => [
            "name" => "countlogin",
            "value" => 1,
        ],
        8 => [
            "name" => "uniquehash",
            "value" => 0,
        ],
        9 => [
            "name" => "usertype",
            "value" => "usr",
        ],
        10 => [
            "name" => "isubs",
            "value" => "[]",
        ],
        11 => [
            "name" => "atmesubs",
            "value" => "[]",
        ],
    ];

    $sqlvalue = "";
    $sqlname = "";
    for ($i = 0; $i < count($login); $i++) {
        $sqlname .= "`" . $login[$i]["name"] . "`";
        $sqlvalue .= "'" . $login[$i]["value"] . "'";

        if (count($login) - 1 > $i) {
            $sqlname .= ", ";
            $sqlvalue .= ", ";
        }
    }

    return "INSERT INTO `users`($sqlname) VALUES ($sqlvalue)";
}
