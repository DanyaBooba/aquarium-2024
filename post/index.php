<?php
session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);
$user = R::getAll(SqlRequestFind($_SESSION["login"]));
if (count($user) <= 0) {
    header("Location: /");
    die();
}
$user = $user[0];

?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Пост | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content person-post">
            <a href="#" class="person-post-back link col-md-1">
                <svg>
                    <use xlink:href="/app/img/icons/bootstrap.svg#chevron-left"></use>
                </svg>
                <span>Назад</span>
            </a>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>