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

##
## Find user
##

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

##
## Add sub to me
##

$subs = array_unique(json_decode($find[0]['isubs']));
$subs2 = array_unique(json_decode($finduser[0]['atmesubs']));

if (in_array(intval($id), $subs)) {
    unset($subs[array_search(intval($id), $subs)]);
    unset($subs2[array_search(intval($find[0]['id']), $subs2)]);
} else {
    array_push($subs, intval($id));
    array_push($subs2, intval($find[0]['id']));
}

$json = json_encode($subs);
$json2 = json_encode($subs2);

$setsql = SqlRequestUpdateISubs($json, $find[0]["email"]);

R::getAll($setsql);

##
## Add sub to him
##

$setsql = SqlRequestUpdateAtMeSubs($json2, $finduser[0]["email"]);

R::getAll($setsql);

header("Location: /user/?id=" . $id);
