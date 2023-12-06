<?php

if (!isset($_SESSION)) session_start();

include_once "../../basic-methods.php";

$post = ClearDisc($_POST["text"]);

if (strlen($post) <= 0) {
    header("Location: /add/?e=len_post");
    return;
}

include_once "../../rb-mysql.php";
include_once "../../token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    return;
}

if ($find[0]["canaddpost"] != 1) {
    header("Location: /add/?e=cant_add");
    return;
}

$maxidsql = SqlRequestGetMaxidPostUser($find[0]["id"], $find[0]["email"]);

$maxid = intval(R::getAll($maxidsql)[0]["MAX(`idpost`)"]);

$postsql = SqlRequestAddPostBasic([
    "idpost" => $maxid + 1,
    "iduser" => $find[0]["id"],
    "useremail" => $find[0]["email"],
    "text" => $post,
    "minipost" => mb_strimwidth($post, 0, 30, ""),
]);

R::getAll($postsql);

header("Location: /person");
