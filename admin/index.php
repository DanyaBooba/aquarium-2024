<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$user = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($user) <= 0) {
    header("Location: /");
    die();
}
$user = $user[0];

if ($user["usertype"] != "adm") {
    header("Location: /404/");
    die();
}

$users = R::getAll(SqlRequestSelectAllAdmin());
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Админ панель | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>АДМИН ПАНЕЛЬ</h1>
            <h2>Действия</h2>
            <ul>
                <li>
                    <a href="/api/php/admin/delete-account.php?id=" class="link">
                        Удаление аккаунта
                    </a>
                </li>
                <li>
                    <a href="/api/php/admin/block-account.php?id=" class="link">
                        Блокировка аккаунта
                    </a>
                </li>
                <li>
                    <a href="/api/php/admin/ban-account.php?id=" class="link">
                        Перманентная блокировка аккаунта
                    </a>
                </li>
                <li>
                    <a href="/api/php/admin/unblock-account.php?id=" class="link">
                        Разблокировка аккаунта
                    </a>
                </li>
            </ul>
            <h2>Пользователи</h2>
            <ol>
                <?php foreach ($users as $u) : ?>
                    <li>
                        <?php echo $u["emailverify"] == 1 ? "<span class='text-success'>T</span>" : "<span class='text-danger'>F</span>" ?>
                        <?php echo $u["firstName"] . " " . $u["lastName"] ?>
                        [<?php echo $u["nickname"] . ", " . $u["id"] ?>]
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
