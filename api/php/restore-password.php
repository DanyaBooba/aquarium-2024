<?php

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

$user = [
    "password" => $_POST["password"],
    "confirm_password" => $_POST["confirm_password"]
];

$code = $_POST["code"];

##
## Password
##

$password = $user["password"];

if ($user["password"] != $user["confirm_password"]) {
    header("Location: /login/restore/password/?e=passw_confirm&c=" . $code);
    return;
}

if (strlen($password) <= 3) {
    header("Location: /login/restore/password/?e=passw_null&c=" . $code);
    return;
}

if (CheckSimplePassword($password)) {
    header("Location: /login/restore/password/?e=passw_simple&c=" . $code);
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findrestoresql = SqlRequestFindRestoreByCode($code);

$findrestore = R::getAll($findrestoresql);

var_dump($findrestore);
