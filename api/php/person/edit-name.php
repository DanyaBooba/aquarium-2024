<?php

session_start();

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

if (strlen($user["firstName"]) < 2 || strlen($user["lastName"]) < 2 || strlen($user["nickname"]) < 2) {
    echo "LEN!";
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

$nicknamesql = SqlRequestFindByNickname($user["nickname"]);

var_dump($nicknamesql);
