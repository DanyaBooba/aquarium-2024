<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";
include_once "../../rb-mysql.php";
include_once "../../token.php";

##
## Block account
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

if ($id == 0) {
    echo "Введите ID в запросе.<br><a href='/admin/'>Назад</a>";
    return;
}

$findidsql = SqlRequestFindId($id);

$findid = R::getAll($findidsql);

if (count($findid) <= 0) {
    echo "Нет пользователя с таким ID.<br><a href='/admin/'>Назад</a>";
    return;
}

##
## Find block
##

$findblocksql = SqlRequestBlockFind($id);

$findblock = R::getAll($findblocksql);

if (count($findblock) > 0) {
    echo "Уже заблокирован.<br><a href='/admin/'>Назад</a>";
    return;
}

$blockaccsql = SqlRequestUpdateBlockUser($id);

R::getAll($blockaccsql);

$blocksql = SqlRequestInsertBlockUser($id, time() + 3600);

R::getAll($blocksql);

echo "Успешно заблокирован.<br><a href='/admin/'>Назад</a>";
