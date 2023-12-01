<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Icon
##

$icon = intval($_POST["icon"]);
$sex = intval($_POST["ismale"]);

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if (mb_strlen(strval($icon)) <= 0) {
    header("Location: /settings/");
    return;
}

$updateiconsql = SqlRequestUpdateIcon($find[0]["email"], $icon);

R::getAll($updateiconsql);

$updatesexsql = SqlRequestUpdateMale($find[0]["email"], $sex);

R::getAll($updatesexsql);

header("Location: /settings/#icon");
