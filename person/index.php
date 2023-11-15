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
$logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".jpg";
$bg = "BG" . $user["capid"] . ".jpg";
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <?php if ($user["emailverify"] == 0) : ?>
                <div class="alert alert-warning d-flex align-items-center">
                    <svg height="32" width="32" class="me-3 svg-normal see-at-pc">
                        <use xlink:href="/app/img/icons/bootstrap.svg#cone-striped"></use>
                    </svg>
                    <span>
                        Для подтверждения аккаунта перейдите по ссылке в письме.
                        <a href="/api/php/person/send-verify.php" class="link">Прислать письмо ещё раз?</a>
                    </span>
                </div>
            <?php endif ?>
            <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/<?php echo $bg ?>');">
                <img src="/app/img/users/icons/<?php echo $logo ?>">
            </div>
            <div class="person-profile">
                <div class="person-profile-content">
                    <div class="person-profile-content-name">
                        <?php if ($user["emailverify"] == 1 && $user["displaynick"] == 0) : ?>
                            <p class="person-profile-content-name-1">
                                <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                            </p>
                        <?php else : ?>
                            <p class="person-profile-content-name-1">
                                <?php echo $user["nickname"] ?>
                            </p>
                        <?php endif ?>
                        <?php if ($user["descr"] > 0) : ?>
                            <p class="person-profile-content-name-2">
                                <?php echo $user["descr"] ?>
                            </p>
                        <?php endif ?>
                        <div class="d-flex align-items-center mt-auto">
                            <div>
                                <b>0</b> Подписчики
                            </div>
                            <div class="ps-2">
                                <b>0</b> Подписан
                            </div>
                        </div>
                    </div>
                    <div class="person-profile-content-buttons">
                        <button onClick="ButtonLeftBar(6)" class="btn btn-secondary">
                            Редактировать профиль
                        </button>
                    </div>
                </div>
            </div>
            <div class="person-form">
                <form action="?" method="post">
                    <div class="input-group">
                        <input type="text" name="post" class="form-control" aria-label="Что у вас нового" placeholder="Что у вас нового...">
                    </div>
                </form>
            </div>
            <?php if (true == false) : ?>
                <div class="row row-cols-1 g-4 person-posts">
                    <div class="col-md-4">
                        <a href="#">
                            <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <img src="/app/img/users/icons/MAN1.jpg" class="person-posts-img" alt="Изображение записи">
                        </a>
                    </div>
                </div>
            <?php else : ?>
                <div class="person-posts-empty">
                    У пользователя нет записей.
                </div>
            <?php endif ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
