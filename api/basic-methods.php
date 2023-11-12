<?php

function ClearStr($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*'];
    return mb_strtolower(str_replace($chars, '', trim($str)));

    //
    // Очищаем строку от спецсимволов
    //
}

function ClearNickname($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*', '?', '@', '$', '%', '^', '&', '(', ')', '+'];
    return mb_strtolower(str_replace($chars, '', trim($str)));

    //
    // Убираем спецсимволы из никнейма
    //
}

function CheckDataUser($user)
{
    if (strlen($user["email"]) > 3 && strlen($user["password"]) > 3) return "ok";

    if (strlen($user["email"]) <= 3) return "email_null";

    if (strlen($user["password"]) <= 3) return "passw_null";

    return "ok";

    //
    // Проверка данных пользователя
    //
}

function RestorePassword($email)
{
    if (strlen($email) <= 3) return "email_null";

    return "ok";

    //
    // Проверка введенного пароля
    //
}

function CheckSimplePassword($password)
{
    $p = $password;

    if (strlen($p) < 3) return 1;

    if ($p == "qwerty" || $p == "1234" || $p == "123456") return 1;

    if ($p == "abc" || $p == "password" || $p == "pass") return 1;

    if ($p == "0000" || $password == "qwerty123") return 1;

    return 0;

    //
    // Проверка: пароль не является простым
    //
}

function SqlRequestCreate($user, $randomstr, $maxid)
{
    $salt = RandomString(16);

    $login = [
        [
            "name" => "email",
            "value" => $user["email"],
        ],
        [
            "name" => "emailverify",
            "value" => 0,
        ],
        [
            "name" => "passhash",
            "value" => password_hash($salt . $user["password"] . $salt, PASSWORD_DEFAULT),
        ],
        [
            "name" => "saltpass",
            "value" => $salt,
        ],
        [
            "name" => "nickname",
            "value" => "user" . $maxid . time(),
        ],
        [
            "name" => "firstName",
            "value" => "empty",
        ],
        [
            "name" => "lastName",
            "value" => "empty",
        ],
        [
            "name" => "datereg",
            "value" => time(),
        ],
        [
            "name" => "countlogin",
            "value" => 1,
        ],
        [
            "name" => "uniquehash",
            "value" => $randomstr . $maxid,
        ],
        [
            "name" => "usertype",
            "value" => "usr",
        ],
        [
            "name" => "isubs",
            "value" => "[]",
        ],
        [
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

    //
    // SQL запрос: создание пользователя
    //

}

function SqlRequestFind($email)
{
    return "SELECT * FROM `users` WHERE email like '" . $email . "'";

    //
    // SQL запрос: проверка на существование пользователя
    //
}

function SqlResetPassword($email, $url)
{
    return "INSERT INTO `reset`(`email`, `timecreate`, `url`) VALUES ('$email', " . time() . ", '$url')";

    //
    // SQL запрос: записываем данные о восстановлении пароля
    //
}

function SqlRequestFindRestore($email)
{
    return "SELECT * FROM `reset` WHERE email like '$email'";

    //
    // SQL запрос: ищем запись в восстановлении пароля
    //
}

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

    //
    // Генерация рандомных строк
    //
}

function SqlRequestDeleteRestore($id)
{
    return "DELETE FROM `reset` WHERE id=$id";

    //
    // Удалить запись из восстановления паролей
    //
}

function SqlRequestFindRestoreByCode($code)
{
    return "SELECT * FROM `reset` WHERE url like '$code'";

    //
    // SQL запрос: поиск восстановления пароля по коду
    //
}

function SqlRequestUpdatePassword($email, $password, $salt)
{
    $newpass = password_hash($salt . $password . $salt, PASSWORD_DEFAULT);
    return "UPDATE `users` SET `passhash` = '$newpass', `saltpass` = '$salt' WHERE email like '$email'";

    //
    // Обновление пароля
    //
}

function SqlRequestSetLoginByCode($email, $code)
{
    return "INSERT INTO `loginbycode`(`email`, `code`, `timecreate`) VALUES ('$email', $code, " . time() . ")";

    //
    // Sql запрос: записываем в логин по коду запись
    //
}

function RandomCode($len)
{
    if ($len <= 0) return "";

    $permitted = '0123456789';

    $input_length = strlen($permitted);
    $random_code = '';
    for ($i = 0; $i < $len; $i++) {
        $random_character = $permitted[mt_rand(0, $input_length - 1)];
        $random_code .= $random_character;
    }

    return $random_code;

    //
    // Случайный код
    //
}

function SqlRequestFindLoginByCode($email)
{
    return "SELECT * FROM `loginbycode` WHERE email like '$email'";

    //
    // Sql запрос: поиск записи входа по коду
    //
}

function SqlRequestDeleteLoginByCode($id)
{
    return "DELETE FROM `loginbycode` WHERE id=$id";

    //
    // Sql запрос: удаление записи входа по коду
    //
}

function SqlRequestFindCode($email, $code)
{
    return "SELECT * FROM `loginbycode` WHERE code=$code AND email like '$email'";

    //
    // Sql запрос: поиск вход по коду
    //
}
