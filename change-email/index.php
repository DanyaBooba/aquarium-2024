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

if ($user[0]["usertype"] == "tst") {
    header("Location: /settings");
    return;
}

$user = $user[0];

$findchangeemail = R::getAll(SqlRequestFindChangeEmail($user["id"], $user["email"]));

if (count($findchangeemail) > 0) {
    header("Location: /change-email/submit");
    die();
}
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error = @ChangeEmailError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Смена почты | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Смена почты</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-setting-content">
                            <div class="alert alert-background d-flex align-items-center" role="alert">
                                <svg height="32" width="32" class="me-3 svg-normal col-md-1 see-at-full-pc">
                                    <use xlink:href="/app/img/icons/bootstrap.min.svg#cone-striped"></use>
                                </svg>
                                <span>
                                    После смены почты, Вам нужно будет заново авторизоваться.
                                </span>
                            </div>
                            <form class="needs-validation" action="/api/php/person/change-email/person-changeemail.php" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <input class="form-control" type="email" name="email" placeholder="Текущая почта" aria-label="Текущая почта" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите текущую почту.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control mb-3" type="email" name="newemail" placeholder="Новая почта" aria-label="Новая почта" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите новую почту.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="password" placeholder="Пароль" aria-label="Пароль" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите пароль.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="confirm" placeholder="Подтвердите смену почты" aria-label="Подтвердите смену почты" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, подтвердите смену почты.
                                    </div>
                                    <p class="form-more form-delete-string">
                                        Введите следующую строчку: <b>Подтверждаю смену почты <?php echo $user["email"] ?></b>.
                                    </p>
                                </div>
                                <button class="btn btn-danger w-100" type="submit">
                                    Сменить почту
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
