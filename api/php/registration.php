<?php

include_once "../basic-methods.php";

$user = [
    "nickname" => $_POST["nickname"],
    "email" => $_POST["email"],
    "password" => $_POST["password"],
    "confirm_password" => $_POST["confirm_password"],
    "confirm" => $_POST["confirm"]
];

##
## Nickname
##

$nickname = ClearNickname($user["nickname"]);

if (strlen($nickname) != strlen($user["nickname"])) {
    header("Location: /registration/?e=nickname_null&g=" . $user["email"]);
    return;
}

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
