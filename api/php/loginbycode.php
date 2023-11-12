<?php

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

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

$savesql = SqlRequestSetLoginByCode($email, RandomCode(6));

var_dump($savesql);
