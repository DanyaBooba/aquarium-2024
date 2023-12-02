<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Delete account
##

$id = intval($_GET["id"]);

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$findsql = SqlRequestFind(isset($_SESSION["login"]) ? $_SESSION["login"] : "");

$find = R::getAll($findsql);

if (count($find) <= 0) {
    header("Location: /404/");
    return;
}

if ($find[0]["usertype"] != "adm") {
    header("Location: /404/");
    return;
}

if ($id == 0 || $id == 1) {
    echo "Введите ID в запросе.<br><a href='/admin/'>Назад</a>";
    return;
}

$findidsql = SqlRequestFindId($id);

$findid = R::getAll($findidsql);

if (count($findid) <= 0) {
    echo "Нет пользователя с таким ID.<br><a href='/admin/'>Назад</a>";
    return;
}

$deletesql = SqlRequestDeleteAccountID($id);

R::getAll($deletesql);

echo "Успешно удален.<br><a href='/admin/'>Назад</a>";
