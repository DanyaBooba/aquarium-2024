<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## User
##

$user = [
    "firstName" => ClearName($_POST["name1"]),
    "lastName" => ClearName($_POST["name2"]),
    "nickname" => ClearNickname($_POST["nickname"])
];

if (mb_strlen($user["firstName"]) < 2 || mb_strlen($user["lastName"]) < 2 || mb_strlen($user["nickname"]) < 2) {
    header("Location: /settings/?e=error_len");
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($_SESSION["login"]);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

$nicknamefindsql = SqlRequestFindByNickname($user["nickname"]);

$nicknamefind = R::getAll($nicknamefindsql);

if (count($nicknamefind) > 0 && $find[0]["email"] != $nicknamefind[0]["email"]) {
    header("Location: /settings/?e=nickname_set");
    return;
}

$updatedatasql = SqlRequestUpdateData($find[0]["email"], $user["nickname"], $user["firstName"], $user["lastName"]);

R::getAll($updatedatasql);

header("Location: /settings/");
