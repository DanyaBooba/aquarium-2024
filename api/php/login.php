<?php

include_once "../basic-methods.php";

$user = [
    "email" => ClearStr($_POST["email"]),
    "password" => $_POST["password"]
];

$check = CheckDataUser($user);

if ($check != "ok") {
    header("Location: /login/?e=$check&g=" . $user["email"]);
    return;
}

include_once "../token.php";

include_once "../rb-mysql.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

var_dump(R::getAll("SELECT * FROM users"));

header("Location: /");
