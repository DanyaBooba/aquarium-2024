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
    header("Location: /registration/?e=passw_confirm&g=" . $user["email"]);
    return;
}

if (strlen($password) <= 3) {
    header("Location: /registration/?e=passw_null&g=" . $user["email"]);
    return;
}

if (CheckSimplePassword($password)) {
    header("Location: /registration/?e=passw_simple&g=" . $user["email"]);
    return;
}

// $hash = password_hash($password, PASSWORD_DEFAULT);
// password_verify($password, $hash);

##
## Confirm
##

if ($user["confirm"] != 1) {
    header("Location: /registration/?e=confirm&g=" . $user["email"]);
    return;
}

##
## Check data Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$check = SqlRequestCreateCheck($user["email"]);

$checkrow = R::getAll($check);

if (count($checkrow) > 0) {
    header("Location: /registration/?e=email_set");
    return;
}

##
## Request to Server
##

$sql = SqlRequestCreate($user);

R::getAll($sql);

header("Location: /");
