<?php

include_once "../basic-methods.php";

$email_restore = ClearStr($_POST["email_restore"]);

$check = RestorePassword($user);

if ($check != "ok") {
    echo "error";
}
