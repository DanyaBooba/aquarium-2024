<?php

include_once "../basic-methods.php";

$user = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
];

var_dump($user);
