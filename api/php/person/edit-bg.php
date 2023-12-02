<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Bg
##

$bg = intval(isset($_POST["bg"]) ? $_POST["bg"] : "");

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if (mb_strlen(strval($bg)) <= 0) {
    header("Location: /settings/");
    return;
}

$updatebgsql = SqlRequestUpdateBg($find[0]["email"], $bg);

R::getAll($updatebgsql);

header("Location: /settings/#cap");
