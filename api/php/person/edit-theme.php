<?php

session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Theme
##

$theme = intval($_POST["theme"]);

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if (mb_strlen(strval($theme)) <= 0) {
    header("Location: /settings/");
    return;
}

$updatebgsql = SqlRequestUpdateTheme($find[0]["email"], $theme);

R::getAll($updatebgsql);

header("Location: /settings/#theme");
