<?php

$pass = [
    "current" => $_POST["current_password"],
    "new" => $_POST["new_password"],
    "confirm" => $_POST["confirm_password"]
];

##
## Password
##

var_dump($pass);
