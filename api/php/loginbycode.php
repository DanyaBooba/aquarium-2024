<?php

session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";
include_once "../mail.php";

$email = $_POST["email"];

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($email);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /login/code/?e=email_null");
    return;
}

$findsavesql = SqlRequestFindLoginByCode($email);

$findsave = R::getAll($findsavesql);

$code = RandomCode(6);

if (count($findsave) > 0) {
    if (abs(time() - $findsave[0]["timecreate"]) > 1800) {
        $deletesql = SqlRequestDeleteLoginByCode($findsave[0]["id"]);

        R::getAll($deletesql);

        $findsave = [];
    }
}

if (count($findsave) <= 0) {
    $savesql = SqlRequestSetLoginByCode($email, $code);
    $save = R::getAll($savesql);
} else {
    $code = $findsave[0]["code"];
}

##
## Mail
##

EmailLoginByCode($email, $code);

// header("Location: /login/code/enter/");
