<?php

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";
include_once "../mail.php";

##
## Check data
##

$email_restore = ClearStr($_POST["email_restore"]);

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

$url = RandomString(80) . $findrestore[0]["id"];

if (count($findrestore) <= 0) {
    $resetsql = SqlResetPassword($email_restore, $url);
    R::getAll($resetsql);
}

##
## Mail
##

EmailRestorePassword($email_restore, $url);
