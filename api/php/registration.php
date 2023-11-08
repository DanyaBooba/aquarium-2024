<?php

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

$user = [
    "email" => $_POST["email"],
    "password" => $_POST["password"],
    "confirm_password" => $_POST["confirm_password"],
    "confirm" => $_POST["confirm"]
];

##
## Email
##

$email = $user["email"];

##
## Password
##

$password = $user["password"];

if ($user["password"] != $user["confirm_password"]) {
    header("Location: /registration/?e=passw_confirm&g=" . $user["email"] . "&n=" . $user["nickname"]);
    return;
}

if (strlen($password) <= 3) {
    header("Location: /registration/?e=passw_null&g=" . $user["email"] . "&n=" . $user["nickname"]);
    return;
}

if (CheckSimplePassword($password)) {
    header("Location: /registration/?e=passw_simple&g=" . $user["email"] . "&n=" . $user["nickname"]);
    return;
}

// $hash = password_hash($password, PASSWORD_DEFAULT);
// password_verify($password, $hash);

##
## Confirm
##

if ($user["confirm"] != 1) {
    header("Location: /registration/?e=confirm&g=" . $user["email"] . "&n=" . $user["nickname"]);
    return;
}

##
## Request to Server
##

// R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

R::setup('mysql:host=localhost;dbname=aquarium', 'root', '123');

$row = R::getAll("SELECT * FROM users");

// echo "EX: ";

var_dump($row);

// $sql = SqlRequestCreate($user);

$sql = "ex";

var_dump($sql);
