<?php

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

$user = [
    "email" => ClearStr($_POST["email"]),
    "password" => $_POST["password"]
];

##
## Check data at empty
##

$check = CheckDataUser($user);

if ($check != "ok") {
    header("Location: /login/?e=$check&g=" . $user["email"]);
    return;
}

##
## Login to Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($user["email"]);

$find = R::getAll($findsql);

var_dump($find);

// header("Location: /");
