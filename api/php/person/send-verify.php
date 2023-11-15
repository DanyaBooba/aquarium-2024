<?php

session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";
include_once "../../mail.php";

##
## User
##

$login = $_SESSION["login"];

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($login);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if ($find[0]["emailverify"] == 1) {
    header("Location: /person/");
    return;
}

$findverifysql = SqlRequestFindVerify($find[0]["email"]);

$findverify = R::getAll($findverifysql);

$url = RandomString(80);

if (count($findverify) > 0) {
    if (abs(time() - $findverify[0]["timecreate"]) > 86400) {
        $deletesql = SqlRequestDeleteVerify($findverify[0]["id"]);
        R::getAll($deletesql);
        $findverify = [];
    } else {
        $url = $findverify[0]["url"];
    }
}

if (count($findverify) <= 0) {
    $setsql = SqlRequestInsertVerify($find[0]["email"], $url);
    R::getAll($setsql);
}

EmailConfirmEmail($find[0]["email"], "https://social.creagoo.ru/api/php/person/check-verify.php?c=" . $url);

header("Location: /person/");
