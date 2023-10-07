<?php

include_once "../basic-methods.php";

$user = [
    "email" => ClearStr($_POST["email"]),
    "password" => $_POST["password"]
];

// var_dump(CheckDataUser($user));

$check = CheckDataUser($user);

if ($check != "ok") {
    echo "error";
}
