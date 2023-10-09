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

echo "OK";
