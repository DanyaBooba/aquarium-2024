<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

if (!isset($_SESSION)) session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";
include_once "../mail.php";

##
## Check data
##

$email_restore = ClearStr(isset($_POST["email_restore"]) ? $_POST["email_restore"] : "");

$check = RestorePassword($email_restore);

if ($check != "ok") {
    header("Location: /login/restore/?e=email_null");
    return;
}

##
## Server
##

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind($email_restore);

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /login/restore/?e=email_null");
    return;
}

$findrestoresql = SqlRequestFindRestore($email_restore);

$findrestore = R::getAll($findrestoresql);

$url = RandomString(80) . $find[0]["id"];

if (count($findrestore) > 0) {
    if (abs(time() - $findrestore[0]["timecreate"]) > 1800) {
        $deleterestore = SqlRequestDeleteRestore($findrestore[0]["id"]);

        R::getAll($deleterestore);

        $findrestore = [];
    }
}

if (count($findrestore) <= 0) {
    $resetsql = SqlResetPassword($email_restore, $url);

    R::getAll($resetsql);
} else {
    $url = $findrestore[0]["url"];
}

##
## Mail
##

EmailRestorePassword($email_restore, "https://aquarium.org.ru/login/restore/enter/?c=" . $url);

header("Location: /login/restore/?a=1");
