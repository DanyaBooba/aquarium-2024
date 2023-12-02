<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Notif
##

$notif = [
    "auth" => intval(isset($_POST["notifauth"]) ? $_POST["notifauth"] : "0"),
    "password" => intval(isset($_POST["notifpass"]) ? $_POST["notifpass"] : "0")
];

if (($notif["auth"] != 1 && $notif["auth"] != 0) || ($notif["password"] != 1 && $notif["password"] != 0)) {
    header("Location: /settings/");
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind(isset($_SESSION["login"]) ? $_SESSION["login"] : "");

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

$updatenotifsql = SqlRequestUpdateNotifications($find[0]["email"], $notif);

R::getAll($updatenotifsql);

header("Location: /settings");
