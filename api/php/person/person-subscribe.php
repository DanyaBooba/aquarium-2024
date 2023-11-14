<?php

session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Login
##

$id = $_GET["id"];
$login = $_SESSION["login"];

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($login);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /");
    return;
}

$findusersql = SqlRequestFindId($id);

$finduser = R::getAll($findusersql);

if (count($finduser) <= 0) {
    header("Location: /person/");
    return;
}

if ($finduser[0]["id"] == $find[0]["id"]) {
    header("Location: /user/?id=" . $id);
    return;
}

$subs = array_unique(json_decode($find[0]['isubs']));

if (in_array(intval($id), $subs)) {
    echo "DEL<br>";
    unset($subs[array_search(intval($id), $subs)]);
} else {
    echo "ADD<br>";
    array_push($subs, intval($id));
}

$json = json_encode($subs);

var_dump($json);

$setsql = SqlRequestUpdateISubs($json, $find[0]["email"]);

R::getAll($setsql);

header("Location: /user/?id=" . $id);
