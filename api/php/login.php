<?php

session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

$user = [
    "email" => ClearStr($_POST["email"]),
    "password" => $_POST["password"]
];

##
## Check data at empty
##

$check = CheckDataUser($user);

if ($check != "ok") {
    header("Location: /login/?e=$check&g=" . $user["email"]);
    return;
}

##
## Login to Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($user["email"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /login/?e=email_null");
    return;
}

if (password_verify($find[0]["saltpass"] . $user["password"] . $find[0]["saltpass"], $find[0]["passhash"]) != 1) {
    header("Location: /login/?e=passw_null&g=" . $user["email"]);
    return;
}

##
## Logined
##

$_SESSION["login"] = $user["email"];

header("Location: /person/");
