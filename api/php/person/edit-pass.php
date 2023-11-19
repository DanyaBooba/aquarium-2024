<?php

session_start();

$user = [
    "current" => $_POST["current_password"],
    "new" => $_POST["new_password"],
    "confirm" => $_POST["confirm_password"]
];

$login = $_SESSION["login"];

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";
include_once "../../mail.php";

##
## Login
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($login);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if (password_verify($find[0]["saltpass"] . $user["current"] . $find[0]["saltpass"], $find[0]["passhash"]) != 1) {
    header("Location: /settings/?e=passw_wrong");
    return;
}

##
## Password
##

$password = $user["new"];

if ($user["new"] != $user["confirm"]) {
    header("Location: /settings?e=passw_another");
    return;
}

if (strlen($password) <= 3) {
    header("Location: /settings/?e=passw_null");
    return;
}

if (CheckSimplePassword($password)) {
    header("Location: /settings/?e=passw_simple");
    return;
}

if ($password == $user["current"]) {
    header("Location: /settings/?e=passw_notnew");
    return;
}

$salt = RandomString(80);

$newpasssql = SqlRequestNewPass($login, password_hash($salt . $password . $salt, PASSWORD_DEFAULT), $salt);

R::getAll($newpasssql);

EmailUpdatePassword($login);

header("Location: /settings/");
