<?php

//
// Очищаем строку от спецсимволов
//

function ClearStr($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*'];
    return mb_strtolower(str_replace($chars, '', trim($str)));
}

//
// Убираем спецсимволы из никнейма
//

function ClearNickname($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*', '?', '@', '$', '%', '^', '&', '(', ')', '+'];
    return mb_strtolower(str_replace($chars, '', trim($str)));
}

//
// Проверка данных пользователя
//

function CheckDataUser($user)
{
    if (strlen($user["email"]) > 3 && strlen($user["password"]) > 3) return "ok";

    if (strlen($user["email"]) <= 3) return "email_null";

    if (strlen($user["password"]) <= 3) return "passw_null";

    return "error";
}

//
// Проверка введенного пароля
//

function RestorePassword($email)
{
    if (strlen($email) <= 3) return "email_null";

    return "ok";
}

//
// Проверка: пароль не является простым
//

function CheckSimplePassword($password)
{
    if ($password == "qwerty" || $password == "1234" || $password == "123456" || $password == "qwerty123" || $password == "abc" || $password == "password" || $password == "pass") {
        return 1;
    }

    return 0;
}

//
// SQL запрос: создание пользователя
//

function SqlRequestCreate($user, $unique)
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
            "value" => $unique,
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

//
// SQL запрос: проверка на существование пользователя
//

function SqlRequestFind($email)
{
    return "SELECT * FROM `users` WHERE email like '" . $email . "'";
}

//
// SQL запрос: записываем данные о восстановлении пароля
//

function SqlResetPassword($email, $url)
{
    return "INSERT INTO `reset`(`email`, `timecreate`, `url`) VALUES ('$email', " . time() . ", '$url')";
}

//
// SQL запрос: ищем запись в восстановлении пароля
//

function SqlRequestFindRestore($email)
{
    return "SELECT * FROM `reset` WHERE email like '$email'";
}

//
// Генерация рандомных строк
//

function RandomString($len)
{
    if ($len <= 0) return "";

    $permitted = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $input_length = strlen($permitted);
    $random_string = '';
    for ($i = 0; $i < $len; $i++) {
        $random_character = $permitted[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}
