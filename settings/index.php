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

$usenickname = $user["firstName"] != "" && $user["lastName"] != "";
$usedisabled = $usenickname == false ? "disabled" : "";

$formnick = $user["displaynick"] == 1 ? "checked" : "";
$formname = $formnick == "checked" ? "" : "checked";
$disc = $user["descr"];

$sex = $user["ismale"];
$sexman = $sex == 1 ? "checked" : "";
$sexwoman = $sexman == "checked" ? "" : "checked";
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error_data = SettingsErrorData($_GET["e"]) ?>
<?php $error_info = SettingsErrorInfo($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Настройки аккаунта | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Настройки</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="col-md-8">
                        <div class="person-setting-bg person-setting-content">
                            <?php if ($user["emailverify"] == 0) : ?>
                                <div class="alert alert-background d-flex align-items-center" role="alert">
                                    <svg height="32" width="32" class="me-3 svg-normal col-md-1 see-at-full-pc">
                                        <use xlink:href="/app/img/icons/bootstrap.svg#cone-striped"></use>
                                    </svg>
                                    <span>
                                        Для подтверждения аккаунта перейдите по ссылке в письме.
                                    </span>
                                </div>
                            <?php endif ?>
                            <h2 id="data">Личные данные</h2>
                            <form class="needs-validation" action="/api/php/person/edit-name.php" method="post" novalidate>
                                <?php if (empty($error_data) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_data ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <input class="form-control" type="text" value="<?php echo $user["firstName"] ?>" name="name1" placeholder="Имя" aria-label="Имя" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите имя.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="name2" value="<?php echo $user["lastName"] ?>" placeholder="Фамилия" aria-label="Фамилия" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите фамилию.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="nickname" value="<?php echo $user["nickname"] ?>" placeholder="Никнейм" aria-label="Никнейм" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите уникальный никнейм.
                                    </div>
                                    <p class="form-more">
                                        Уникальное короткое имя.
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="info">Сведения</h2>
                            <form class="needs-validation" action="/api/php/person/edit-info.php" method="post" novalidate>
                                <?php if (empty($error_info) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_info ?>
                                    </div>
                                <?php endif; ?>
                                <p style="margin-bottom: 4px">
                                    На месте имени отображать:
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="display_nickname" id="radioinfo1" <?php echo $formnick ?>>
                                    <label class="form-check-label" for="radioinfo1">
                                        Никнейм
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 8px">
                                    <input class="form-check-input" type="radio" value="0" name="display_nickname" id="radioinfo2" <?php echo $usedisabled ?> <?php echo $formname ?>>
                                    <label class="form-check-label" for="radioinfo2" style="margin-bottom: 4px">
                                        Имя и фамилию
                                    </label>
                                    <?php if ($usenickname == false) : ?>
                                        <p class="form-more">
                                            Заполните поля: имя и фамилию.
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <p style="margin-bottom: 4px">
                                    Пол:
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="sex" id="radiosex1" <?php echo $sexman ?>>
                                    <label class="form-check-label" for="radiosex1">
                                        Мужской
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 8px">
                                    <input class="form-check-input" type="radio" value="0" name="sex" id="radiosex2" <?php echo $sexwoman ?>>
                                    <label class="form-check-label" for="radiosex2" style="margin-bottom: 4px">
                                        Женский
                                    </label>
                                    <?php if ($usenickname == false) : ?>
                                        <p class="form-more">
                                            Заполните поля: имя и фамилию.
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <textarea class="form-control" name="disc" aria-label="Описание профиля" placeholder="Описание профиля" maxlength="254"><?php echo $disc ?></textarea>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="icon">Фотография</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="cap">Обложка</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="person-setting-bg person-setting-bar">
                            <ul>
                                <li>
                                    <a href="#data">
                                        Личные данные
                                    </a>
                                </li>
                                <li>
                                    <a href="#info">
                                        Сведения
                                    </a>
                                </li>
                                <li>
                                    <a href="#icon">
                                        Фотография
                                    </a>
                                </li>
                                <li>
                                    <a href="#cap">
                                        Обложка
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="person-setting-bg person-setting-bar d-flex align-items-center">
                            <svg class="svg-normal me-2" width="16" height="16">
                                <use xlink:href="/app/img/icons/bootstrap.svg#question-circle"></use>
                            </svg>
                            <a href="/about/verify-account/" class="link">
                                Подтверждение аккаунта
                            </a>
                        </div>
                        <div class="person-setting-bg person-setting-bar">
                            <a href="/api/php/person/person-exit.php" class="link-danger">
                                Выйти из аккаунта
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/app/js/form-edit-url.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
