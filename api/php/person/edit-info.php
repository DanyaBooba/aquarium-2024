<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Data
##

$user = [
    "display" => $_POST["display_nickname"],
    "disc" => ClearDisc($_POST["disc"]),
    "sex" => $_POST["sex"],
];

if (mb_strlen($user["disc"]) > 254) {
    header("Location: /settings/");
    return;
}

##
## Find user
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

$descsql = SqlRequestUpdateDesc($find[0]["email"], $user["disc"]);

R::getAll($descsql);

$displaysql = SqlRequestUpdateDisplaynick($find[0]["email"], $user["display"]);

R::getAll($displaysql);

$sexsql = SqlRequestUpdateMale($find[0]["email"], $user["sex"]);

R::getAll($sexsql);

header("Location: /settings/");
