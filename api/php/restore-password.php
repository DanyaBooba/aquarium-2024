<?php

if (!isset($_SESSION)) session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";

$user = [
    "password" => $_POST["password"],
    "confirm_password" => $_POST["confirm_password"]
];

$code = $_POST["code"];

##
## Password
##

$password = $user["password"];

if ($user["password"] != $user["confirm_password"]) {
    header("Location: /login/restore/enter/?e=passw_confirm&c=" . $code);
    return;
}

if (strlen($password) <= 3) {
    header("Location: /login/restore/enter/?e=passw_null&c=" . $code);
    return;
}

if (CheckSimplePassword($password)) {
    header("Location: /login/restore/enter/?e=passw_simple&c=" . $code);
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findrestoresql = SqlRequestFindRestoreByCode($code);

$findrestore = R::getAll($findrestoresql);

if (abs(time() - $findrestore[0]["timecreate"]) > 1800) {
    header("Location: /login/restore/?e=time_url");
    die();
}

$findusersql = SqlRequestFind($findrestore[0]["email"]);

$finduser = R::getAll($findusersql);

if (count($finduser) <= 0) {
    header("Location: /login/restore/?e=email_null");
    die();
}

$updatepasssql = SqlRequestUpdatePassword($finduser[0]["email"], $password, RandomString(16));

R::getAll($updatepasssql);

##
## Clear reset
##

$deleteresetsql = SqlRequestDeleteRestore($findrestore[0]["id"]);

R::getAll($deleteresetsql);

header("Location: /login/");
