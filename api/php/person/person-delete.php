<?php

if (!isset($_SESSION)) session_start();

$user = [
    "email" => isset($_POST["email"]) ? $_POST["email"] : "",
    "password" => isset($_POST["password"]) ? $_POST["password"] : "",
    "string" => isset($_POST["string"]) ? $_POST["string"] : "",
];

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";
include_once "../../mail.php";

##
## Login
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";

$findsql = SqlRequestFind($login);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}
$find = $find[0];

##
## Check data
##

if ($user["string"] != "Удаляю аккаунт с почтой " . $login) {
    header("Location: /delete/?e=not_correct");
    return;
}

if ($user["email"] != $login) {
    header("Location: /delete/?e=ano_email");
    return;
}

if (password_verify($find["saltpass"] . $user["password"] . $find["saltpass"], $find["passhash"]) != 1) {
    header("Location: /delete/?e=ano_pass");
    return;
}

##
## Delete account
##

$savedeletesql = SqlRequestSaveDeleteAccount($login, $find["datereg"]);

R::getAll($savedeletesql);

$deletesql = SqlRequestDeleteAccount($login);

R::getAll($deletesql);

$_SESSION["login"] = "";

##
## Mail
##

EmailDeleteAccount($user["email"]);

header("Location: /");
