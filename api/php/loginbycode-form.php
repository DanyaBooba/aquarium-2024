<?php

session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";
include_once "../mail.php";

$user = [
    "email" => $_POST["email"],
    "code" => $_POST["code"],
];

##
## Code
##

if (strlen($user["code"]) != 6) {
    header("Location: /login/code/enter/?e=code_null&g=" . $user["email"]);
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findcodesql = SqlRequestFindCode($user["email"], $user["code"]);

$findcode = R::getAll($findcodesql);

if (count($findcode) <= 0) {
    header("Location: /login/code/enter/?e=error");
    return;
}

$findusersql = SqlRequestFind($user["email"]);

$finduser = R::getAll($findusersql);

if (count($finduser) <= 0) {
    header("Location: /login/code/enter/?e=email_null");
    return;
}

$deletesql = SqlRequestDeleteLoginByCode($findcode[0]["id"]);

R::getAll($deletesql);

##
## Logined
##

$_SESSION["login"] = $user["email"];

EmailAfterLogin($user["email"]);

header("Location: /person/");
