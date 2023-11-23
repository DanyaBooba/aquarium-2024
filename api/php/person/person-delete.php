<?php

session_start();

$user = [
    "email" => $_POST["email"],
    "password" => $_POST["password"],
    "string" => $_POST["string"],
];

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";
include_once "../../mail.php";

##
## Login
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}
$find = $find[0];

##
## Check data
##

if ($user["string"] != "Удаляю аккаунт с почтой " . $_SESSION["login"]) {
    echo "STRING";
    return;
}

if ($user["email"] != $_SESSION["login"]) {
    echo "EMAIL";
    return;
}

if (password_verify($find["saltpass"] . $user["password"] . $find["saltpass"], $find["passhash"]) != 1) {
    echo "PASS";
    return;
}

##
## Delete account
##

$savedeletesql = SqlRequestSaveDeleteAccount($_SESSION["login"], $find["datereg"]);

R::getAll($savedeletesql);

$deletesql = SqlRequestDeleteAccount($_SESSION["login"]);

R::getAll($deletesql);

$_SESSION["login"] = "";

##
## Mail
##

EmailDeleteAccount($user["email"]);

header("Location: /");
