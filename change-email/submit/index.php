<?php
if (!isset($_SESSION)) session_start();
include_once "../../api/auth-errors.php";

include_once "../../api/rb-mysql.php";
include_once "../../api/basic-methods.php";
include_once "../../api/token.php";

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

$findchangeemail = R::getAll(SqlRequestFindChangeEmail($user["id"], $user["email"]));

if (count($findchangeemail) <= 0) {
    header("Location: /change-email");
    die();
}
?>

<?php include_once "../../app/php/head.php"; ?>

<?php $error = @ChangeEmailError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Подтверждение смены почты | Аквариум</title>

<body class="container">
    <?php include_once "../../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Подтверждение смены почты</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-setting-content">
                            <form class="needs-validation" action="/api/php/person/change-email/person-changeemail-confirm.php" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <input class="form-control" type="number" name="code" placeholder="Код" aria-label="Код" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите код.
                                    </div>
                                    <p class="form-more form-delete-string">
                                        Введите код с текущей почты.
                                    </p>
                                </div>
                                <div>
                                    <input class="form-control" type="number" name="codenew" placeholder="Код с новой почты" aria-label="Код с новой почты" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите код.
                                    </div>
                                    <p class="form-more form-delete-string">
                                        Введите код с новой почты.
                                    </p>
                                </div>
                                <button class="btn btn-danger w-100" type="submit">
                                    Сменить почту
                                </button>
                            </form>
                            <a href="/api/php/person/change-email/delete-changeemail.php" class="link">
                                Отменить смену почты
                            </a>
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

    <?php include_once "../../app/php/footer.php"; ?>
</body>

</html>
