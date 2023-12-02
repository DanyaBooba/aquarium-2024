<?php

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Check verify
##

$url = isset($_GET["c"]) ? $_GET["c"] : "";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestVerifyFindByUrl($url);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    // ОТПРАВИТЬ ПИСЬМО

    header("Location: /person/");
    return;
}

if (abs(time() - $find[0]["timecreate"]) > 86400) {
    // ОТПРАВИТЬ ПИСЬМО

    header("Location: /person/");
    return;
}

##
## Find user
##

$findusersql = SqlRequestFind($find[0]["email"]);

$finduser = R::getAll($findusersql);

if (count($finduser) <= 0) {
    header("Location: /");
    return;
}

$updatesql = SqlRequestUpdateVerifyEmail($find[0]["email"]);

R::getAll($updatesql);

$deletesql = SqlRequestDeleteVerify($find[0]["id"]);

R::getAll($deletesql);

header("Location: /person/");
