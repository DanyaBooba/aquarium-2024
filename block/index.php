<?php
if (!isset($_SESSION)) session_start();
date_default_timezone_set('Europe/Moscow');

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$user = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($user) <= 0) {
    header("Location: /");
    die();
}

if ($user[0]["isblock"] != 1) {
    header("Location: /");
    die();
}
$user = $user[0];

$data = R::getAll(SqlRequestBlockFind($user["id"]));

if (count($data) <= 0) {
    R::getAll(SqlRequestUpdateUnBlockUser($user["id"]));
    header("Location: /");
    die();
}
$data = $data[0];

if (intval($data["timecreate"]) > intval($data["totime"])) {
    $res = false;
} else {
    $res = intval($data["totime"]) - intval(time());

    if ($res <= 0) {
        R::getAll(SqlRequestUpdateUnBlockUser($user["id"]));
        R::getAll(SqlRequestInsertUnBlockUser($user["id"]));
        header("Location: /person/");
        die();
    }

    $datenow = date("Y-m-d", time());
    $date = date("Y-m-d", intval($data["totime"]));

    $date = date("H:i:s d/m/Y", intval($data["totime"]));

    if (gmdate("Y-m-d", time()) == gmdate("Y-m-d", intval($data["totime"]))) {
        $date = date("H:i", intval($data["totime"]));
    }
}
?>

<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/error/error.css">

<main class="form-signin w-100 m-auto d-flex text-center flex-column justify-content-center">
    <div class="d-flex justify-content-center">
        <h1 class="display-4">Ваш аккаунт заблокирован</h1>
    </div>
    <?php if ($res == false) : ?>
        <div id="text" class="mb-4">
            Вы больше не сможете использовать данный аккаунт.
        </div>
    <?php else : ?>
        <div id="text" class="mb-4">
            Разблокировка:<br>
            <?php echo $date ?>
            UTC
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <a href="/api/php/person/person-exit.php" aria-label="Выйти из аккаунта" class="link">
            Вы можете выйти из аккаунта
        </a>
    </div>
</main>

<?php include_once "../app/php/bottom/javascript.php"; ?>
