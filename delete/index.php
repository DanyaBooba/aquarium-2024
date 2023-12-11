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

if ($user[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$user = $user[0];
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error = @DeleteAccountError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Удалить аккаунт | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <div class="d-flex align-items-center mb-1">
                <svg class="svg-normal me-1" width="14" height="14">
                    <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-left"></use>
                </svg>
                <a href="/settings/" class="link">
                    Назад
                </a>
            </div>
            <h1>Удалить аккаунт</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-setting-content">
                            <div class="alert alert-background d-flex align-items-center" role="alert">
                                <svg height="32" width="32" class="me-3 svg-normal col-md-1 see-at-full-pc">
                                    <use xlink:href="/app/img/icons/bootstrap.min.svg#cone-striped"></use>
                                </svg>
                                <span>
                                    Удаление аккаунта происходит безвозмездно, после его невозможно
                                    будет восстановить.
                                </span>
                            </div>
                            <form class="needs-validation" action="/api/php/person/person-delete.php" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <input class="form-control" type="email" name="email" placeholder="Почта" aria-label="Почта" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите почту.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="password" placeholder="Пароль" aria-label="Пароль" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите пароль.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="string" placeholder="Подтвердите удаление" aria-label="Подтвердите удаление" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, подтвердите удаление.
                                    </div>
                                    <p class="form-more form-delete-string">
                                        Введите следующую строчку: <b>Удаляю аккаунт с почтой <?php echo $user["email"] ?></b>.
                                    </p>
                                </div>
                                <button class="btn btn-danger w-100" type="submit">
                                    Удалить аккаунт
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="person-rightbar-empty"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="/app/js/person/leftbarbuttons.js"></script>
    <script src="/app/js/person/formediturl.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
