<?php

function ClearStr($str)
{
    $chars = ['!', '#', '<', '>', '«', '»', ' ', ';', ',', '*'];
    return mb_strtolower(str_replace($chars, '', trim(strip_tags($str))));

    //
    // Очищаем строку от спецсимволов
    //
}

function ClearNickname($str)
{
    $chars = [
        '!', '#', '<', '>', '«', '»', ' ', ';', ',', '*', '?', '@', '$', '%', '^', '&', '(', ')', '+',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с',
        'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А', 'Б', 'В', 'Г', 'Д',
        'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц',
        'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', '_', '}', '{', '|', '/', '\\', '"', '\''
    ];

    return mb_strtolower(str_replace($chars, '', trim(strip_tags($str))));

    //
    // Убираем спецсимволы из никнейма
    //
}

function ClearName($str)
{
    $chars = [
        '!', '#', '<', '>', '«', '»', ' ', ';', ',', '*', '?', '@', '$', '%', '^', '&', '(', ')', '+',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
        'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B',
        'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U',
        'V', 'W', 'X', 'Y', 'Z', '_', '}', '{', '|', '/', '\\', '"', '\''
    ];

    return str_replace($chars, '', trim(strip_tags($str)));

    //
    // Убираем спецсимволы из имени
    //
}

function ClearDisc($str)
{
    return trim(strip_tags($str));

    //
    // Убираем спецсимволы из описания
    //
}

function ClearSearch($search)
{
    $chars = [
        '<', '>', '«', '»', ' ', ';', '$', '%', '^', '&', '}', '{', '|', '/', '\\', '"', '\''
    ];

    return str_replace($chars, '', trim(strip_tags($search)));

    //
    // Убираем специсимволы из запроса
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

    if ($p == "0000" || $p == "qwerty123" || $p == "1111") return 1;

    return 0;

    //
    // Проверка: пароль не является простым
    //
}

function SqlRequestCreate($user, $randomstr, $maxid)
{
    $salt = RandomString(80);

    $login = [
        [
            "name" => "email",
            "value" => $user["email"],
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
            "name" => "datereg",
            "value" => time(),
        ],
        [
            "name" => "uniquehash",
            "value" => $randomstr . $maxid,
        ],
        [
            "name" => "achivs",
            "value" => "[]"
        ],
        [
            "name" => "isubs",
            "value" => "[]"
        ],
        [
            "name" => "atmesubs",
            "value" => "[]"
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

function SqlRequestFindId($id)
{
    return "SELECT * FROM `users` WHERE id=" . $id;

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

function SqlRequestFindByNickname($nickname)
{
    return "SELECT * FROM `users` WHERE nickname like '$nickname'";

    //
    // Sql запрос: поиск по никнейму
    //
}

function SqlRequestUpdateData($email, $nickname, $firstName, $lastName)
{
    return "UPDATE `users` SET `nickname` = '$nickname', `firstName` = '$firstName', `lastName` = '$lastName' WHERE email like '$email'";

    //
    // Sql запрос: поиск по никнейму
    //
}

function SqlRequestSelectAll()
{
    return "SELECT * FROM `users` WHERE emailverify=1";

    //
    // Sql запрос: все пользователи
    //
}

function SqlRequestUpdateISubs($json, $email)
{
    return "UPDATE `users` SET `isubs` = '$json' WHERE email like '$email'";

    //
    // Sql запрос: обновляем isubs
    //
}

function SqlRequestUpdateAtMeSubs($json, $email)
{
    return "UPDATE `users` SET `atmesubs` = '$json' WHERE email like '$email'";

    //
    // Sql запрос: обновляем atmesubs
    //
}

function SqlRequestFindVerify($email)
{
    return "SELECT * FROM `emailverify` WHERE email like '$email'";

    //
    // Sql запрос: ищем emailverify
    //
}

function SqlRequestInsertVerify($email, $url)
{
    return "INSERT INTO `emailverify`(`email`, `timecreate`, `url`) VALUES ('$email', " . time() . ", '$url')";

    //
    // Sql запрос: записываем в emailverify email и url
    //
}

function SqlRequestDeleteVerify($id)
{
    return "DELETE FROM `emailverify` WHERE id=$id";

    //
    // Sql запрос: удаляем запись из emailverify по id
    //
}

function SqlRequestVerifyFindByUrl($url)
{
    return "SELECT * FROM `emailverify` WHERE url like '$url'";

    //
    // Sql запрос: поиск по url
    //
}

function SqlRequestUpdateVerifyEmail($email)
{
    return "UPDATE `users` SET `emailverify` = 1 WHERE email like '$email'";

    //
    // Sql запрос: обновляем emailverify
    //
}

function SqlRequestUpdateDesc($email, $desc)
{
    return "UPDATE `users` SET `descr` = '$desc' WHERE email like '$email'";

    //
    // Sql запрос: обновляем описание
    //
}

function SqlRequestUpdateDisplaynick($email, $nick)
{
    return "UPDATE `users` SET `displaynick` = $nick WHERE email like '$email'";

    //
    // Sql запрос: обновляем displaynick
    //
}

function SqlRequestUpdateMale($email, $male)
{
    return "UPDATE `users` SET `ismale` = $male WHERE email like '$email'";

    //
    // Sql запрос: обновляем пол
    //
}

function SqlRequestUpdateIcon($email, $icon)
{
    return "UPDATE `users` SET `logoid` = $icon WHERE email like '$email'";

    //
    // Sql запрос: обновляем логотип
    //
}

function SqlRequestUpdateBg($email, $bg)
{
    return "UPDATE `users` SET `capid` = $bg WHERE email like '$email'";

    //
    // Sql запрос: обновляем фон
    //
}

function SqlRequestUpdateTheme($email, $theme)
{
    return "UPDATE `users` SET `themeid` = $theme WHERE email like '$email'";

    //
    // Sql запрос: обновляем фон
    //
}

function SqlRequestSearch($text)
{
    $more = "(NICKNAME like '%$text%' OR firstName like '%$text%' OR lastName like '%$text%' or descr like '%$text%')";
    if ($text[0] == "@") {
        $text = substr($text, 1);
        $more = "nickname like '%$text%'";
    }

    return "SELECT * FROM `users` WHERE (emailverify=1) AND $more";

    //
    // Sql запрос: ищем по базе данных
    //
}

function SqlRequestSearchOffset($text, $offset)
{
    $more = "(NICKNAME like '%$text%' OR firstName like '%$text%' OR lastName like '%$text%' or descr like '%$text%')";
    if ($text[0] == "@") {
        $text = substr($text, 1);
        $more = "nickname like '%$text%'";
    }

    return "SELECT * FROM `users` WHERE (emailverify=1) AND $more LIMIT $offset, 100";

    //
    // Sql запрос: ищем по базе данных
    //
}

function SqlRequestNewPass($email, $pass, $salt)
{
    return "UPDATE `users` SET `passhash` = '$pass', `saltpass` = '$salt' WHERE email like '$email'";

    //
    // Sql запрос: обновление пароля
    //
}

function SqlRequestDeleteAccount($email)
{
    return "DELETE FROM `users` WHERE email like '$email'";

    //
    // Sql запрос: удаление аккаунта
    //
}

function SqlRequestSaveDeleteAccount($email, $timecreate)
{
    return "INSERT INTO `deleted`(`email`, `timedelete`, `timecreate`) VALUES ('$email', $timecreate, " . time() . ")";

    //
    // Sql запрос: удаленный аккаунт
    //
}

function SqlRequestFindNotifications($email)
{
    return "SELECT * FROM `notifications` WHERE foremail like '$email'";

    //
    // Sql запрос: поиск уведомлений
    //
}

function SqlRequestCreateYandex($user)
{
    $salt = RandomString(16);

    $login = [
        [
            "name" => "email",
            "value" => $user["email"],
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
            "value" => $user["nickname"]
        ],
        [
            "name" => "datereg",
            "value" => time(),
        ],
        [
            "name" => "uniquehash",
            "value" => "ya_" . RandomString(80) . $user["id"],
        ],
        [
            "name" => "emailverify",
            "value" => 1,
        ],
        [
            "name" => "firstName",
            "value" => $user["firstName"],
        ],
        [
            "name" => "lastName",
            "value" => $user["lastName"],
        ],
        [
            "name" => "achivs",
            "value" => "[]"
        ],
        [
            "name" => "isubs",
            "value" => "[]"
        ],
        [
            "name" => "atmesubs",
            "value" => "[]"
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

function SqlRequestCreateGoogle($user)
{
    $salt = RandomString(16);

    $login = [
        [
            "name" => "email",
            "value" => $user["email"],
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
            "value" => $user["nickname"]
        ],
        [
            "name" => "datereg",
            "value" => time(),
        ],
        [
            "name" => "uniquehash",
            "value" => "go_" . RandomString(80) . $user["id"],
        ],
        [
            "name" => "emailverify",
            "value" => $user["emailverify"],
        ],
        [
            "name" => "achivs",
            "value" => "[]"
        ],
        [
            "name" => "isubs",
            "value" => "[]"
        ],
        [
            "name" => "atmesubs",
            "value" => "[]"
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

function SqlRequestSelectAllAdmin()
{
    return "SELECT * FROM `users`";

    //
    // Sql запрос: все пользователи для админки
    //
}

function SqlRequestDeleteAccountID($id)
{
    return "DELETE FROM `users` WHERE id=$id";

    //
    // Sql запрос: удаление аккаунта
    //
}

function SqlRequestUpdateBlockUser($id)
{
    return "UPDATE `users` SET `isblock`=1 WHERE id=$id";

    //
    // Sql запрос: блокировка у users
    //
}

function SqlRequestInsertBlockUser($id, $totime)
{
    return "INSERT INTO `block`(`iduser`, `timecreate`, `totime`) VALUES ($id, " . time() . ", $totime)";

    //
    // Sql запрос: блокировка запись
    //
}

function SqlRequestBlockFind($id)
{
    return "SELECT * FROM `block` WHERE iduser=$id";
}

function SqlRequestUpdateUnBlockUser($id)
{
    return "UPDATE `users` SET `isblock`=0 WHERE id=$id";

    //
    // Sql запрос: разблокировка у users
    //
}

function SqlRequestInsertUnBlockUser($id, $totime)
{
    return "DELETE FROM `block` WHERE iduser=$id";

    //
    // Sql запрос: разблокировка запись
    //
}

function SqlRequestFindPostsEmail($email)
{
    return "SELECT * FROM `posts` WHERE useremail like '$email'";

    //
    // Sql запрос: ищем пост по почте
    //
}

function SqlRequestFindCurrentPost($iduser, $idpost)
{
    return "SELECT * FROM `posts` WHERE iduser=$iduser AND idpost=$idpost";

    //
    // Sql запрос: выбор поста
    //
}

function SqlRequestFindAchivs($id)
{
    return "SELECT * FROM `achivs` WHERE number=$id";

    //
    // Sql запрос: выбор поста
    //
}
