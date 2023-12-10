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

$usenickname = $user["firstName"] != "" && $user["lastName"] != "";
$usedisabled = $usenickname == false ? "disabled" : "";

$formnick = $user["displaynick"] == 1 ? "checked" : "";
$formname = $formnick == "checked" ? "" : "checked";
$disc = $user["descr"];

$sex = $user["ismale"];
$sexman = $sex == 1 ? "checked" : "";
$sexwoman = $sexman == "checked" ? "" : "checked";

$formicon = [
    null,
    $user["logoid"] == 1 ? "checked" : "",
    $user["logoid"] == 2 ? "checked" : "",
    $user["logoid"] == 3 ? "checked" : "",
    $user["logoid"] == 4 ? "checked" : "",
    $user["logoid"] == 5 ? "checked" : "",
    $user["logoid"] == 6 ? "checked" : "",
    $user["logoid"] == 7 ? "checked" : "",
];

$formbg = [
    null,
    $user["capid"] == 1 ? "checked" : "",
    $user["capid"] == 2 ? "checked" : "",
    $user["capid"] == 3 ? "checked" : "",
    $user["capid"] == 4 ? "checked" : "",
    $user["capid"] == 5 ? "checked" : "",
    $user["capid"] == 6 ? "checked" : "",
    $user["capid"] == 7 ? "checked" : "",
];

$formtheme = [
    null,
    $user["themeid"] == 1 ? "checked" : "",
    $user["themeid"] == 2 ? "checked" : "",
    $user["themeid"] == 3 ? "checked" : "",
    $user["themeid"] == 4 ? "checked" : "",
    $user["themeid"] == 5 ? "checked" : "",
    $user["themeid"] == 6 ? "checked" : "",
    $user["themeid"] == 7 ? "checked" : "",
    $user["themeid"] == 0 ? "checked" : "",
];

$formnotif = [
    null,
    $user["notifauth"] == 1 ? "checked" : "",
    $user["notifpass"] == 1 ? "checked" : "",
];

$formmale = $sex == 1 ? "MAN" : "WOMAN";

$secondemail = $_SESSION["secondlogin"];
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error_data = @SettingsErrorData($_GET["e"]) ?>
<?php $error_info = @SettingsErrorInfo($_GET["e"]) ?>
<?php $error_pass = @SettingsErrorPass($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Настройки аккаунта | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Настройки</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-setting-content">
                            <?php if ($user["emailverify"] == 0) : ?>
                                <div class="alert alert-background d-flex align-items-center" role="alert">
                                    <svg height="32" width="32" class="me-3 svg-normal col-md-1 see-at-full-pc">
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#cone-striped"></use>
                                    </svg>
                                    <span>
                                        Для подтверждения аккаунта, перейдите по ссылке в письме.
                                    </span>
                                </div>
                            <?php endif ?>
                            <h2 id="password">Пароль</h2>
                            <form class="needs-validation" action="/api/php/person/edit-pass.php" method="post" novalidate>
                                <?php if (empty($error_pass) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_pass ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <input class="form-control" type="password" name="current_password" placeholder="Текущий пароль" aria-label="Текущий пароль" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите текущий пароль.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="new_password" placeholder="Новый пароль" aria-label="Новый пароль" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите новый пароль.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Подтвердите пароль" aria-label="Подтвердите пароль" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, подтвердите введенный пароль.
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <div class="form-delete-account">
                                <button class="btn btn-danger w-100" onClick="ChangeEmail()">
                                    Сменить почту
                                </button>
                            </div>
                            <div class="form-delete-account">
                                <button class="btn btn-danger w-100" onClick="DeleteAccount()" style="margin-top: 10px;">
                                    Удалить аккаунт
                                </button>
                            </div>
                            <hr>
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
                                    <input class="form-check-input" type="radio" onInput="ChangeDataSexMan()" value="1" name="sex" id="radiosex1" <?php echo $sexman ?>>
                                    <label class="form-check-label" for="radiosex1">
                                        Мужской
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 8px">
                                    <input class="form-check-input" type="radio" value="0" onInput="ChangeDataSexWoman()" name="sex" id="radiosex2" <?php echo $sexwoman ?>>
                                    <label class="form-check-label" for="radiosex2" style="margin-bottom: 4px">
                                        Женский
                                    </label>
                                </div>
                                <textarea class="form-control" name="disc" aria-label="Описание профиля" placeholder="Описание профиля" maxlength="254"><?php echo $disc ?></textarea>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="notifications">Уведомления</h2>
                            <form class="needs-validation" action="/api/php/person/edit-notifications.php" method="post" novalidate>
                                <p style="margin-bottom: 4px">
                                    Уведомлять о действиях:
                                </p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="notif1" name="notifauth" value="1" <?php echo $formnotif[1] ?>>
                                    <label class="form-check-label" for="notif1">
                                        Авторизация в аккаунт
                                    </label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="notif2" name="notifpass" value="1" <?php echo $formnotif[2] ?>>
                                    <label class="form-check-label" for="notif2">
                                        Смена пароля
                                    </label>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="icon">Фотография</h2>
                            <form class="needs-validation person-settings-form-image" action="/api/php/person/edit-icon.php" method="post" novalidate>
                                <div class="row row-cols-2 row-cols-lg-4 g-2">
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon1" value="1" <?php echo $formicon[1] ?>>
                                        <label class="list-group-item" for="icon1">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>1.png" id="imgicon1">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon2" value="2" <?php echo $formicon[2] ?>>
                                        <label class="list-group-item" for="icon2">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>2.png" id="imgicon2">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon3" value="3" <?php echo $formicon[3] ?>>
                                        <label class="list-group-item" for="icon3">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>3.png" id="imgicon3">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon4" value="4" <?php echo $formicon[4] ?>>
                                        <label class="list-group-item" for="icon4">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>4.png" id="imgicon4">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon5" value="5" <?php echo $formicon[5] ?>>
                                        <label class="list-group-item" for="icon5">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>5.png" id="imgicon5">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon6" value="6" <?php echo $formicon[6] ?>>
                                        <label class="list-group-item" for="icon6">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>6.png" id="imgicon6">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="icon" id="icon7" value="7" <?php echo $formicon[7] ?>>
                                        <label class="list-group-item" for="icon7">
                                            <img src="/app/img/users/icons/<?php echo $formmale ?>7.png" id="imgicon7">
                                        </label>
                                    </div>
                                    <input type="text" class="d-none" name="ismale" id="ismale" value="<?php echo $sex ?>">
                                </div>
                                <button class="btn btn-primary col-md-6 mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="cap">Обложка</h2>
                            <form class="needs-validation person-settings-form-image form-image-bg" action="/api/php/person/edit-bg.php" method="post" novalidate>
                                <div class="row row-cols-1 row-cols-lg-2 g-2">
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg1" value="1" <?php echo $formbg[1] ?>>
                                        <label class="list-group-item" for="bg1">
                                            <img src="/app/img/users/bg/BG1.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg2" value="2" <?php echo $formbg[2] ?>>
                                        <label class="list-group-item" for="bg2">
                                            <img src="/app/img/users/bg/BG2.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg3" value="3" <?php echo $formbg[3] ?>>
                                        <label class="list-group-item" for="bg3">
                                            <img src="/app/img/users/bg/BG3.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg4" value="4" <?php echo $formbg[4] ?>>
                                        <label class="list-group-item" for="bg4">
                                            <img src="/app/img/users/bg/BG4.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg5" value="5" <?php echo $formbg[5] ?>>
                                        <label class="list-group-item" for="bg5">
                                            <img src="/app/img/users/bg/BG5.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg6" value="6" <?php echo $formbg[6] ?>>
                                        <label class="list-group-item" for="bg6">
                                            <img src="/app/img/users/bg/BG6.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="bg" id="bg7" value="7" <?php echo $formbg[7] ?>>
                                        <label class="list-group-item" for="bg7">
                                            <img src="/app/img/users/bg/BG7.jpg">
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary col-md-6 mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="theme">Тема</h2>
                            <form class="needs-validation person-settings-form-image form-image-bg" action="/api/php/person/edit-theme.php" method="post" novalidate>
                                <div class="row row-cols-1 row-cols-lg-3 g-2">
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme1" value="1" <?php echo $formtheme[1] ?>>
                                        <label class="list-group-item" for="theme1">
                                            <img src="/app/img/users/theme/theme_1.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme2" value="2" <?php echo $formtheme[2] ?>>
                                        <label class="list-group-item" for="theme2">
                                            <img src="/app/img/users/theme/theme_2.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme3" value="3" <?php echo $formtheme[3] ?>>
                                        <label class="list-group-item" for="theme3">
                                            <img src="/app/img/users/theme/theme_3.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme4" value="4" <?php echo $formtheme[4] ?>>
                                        <label class="list-group-item" for="theme4">
                                            <img src="/app/img/users/theme/theme_4.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme5" value="5" <?php echo $formtheme[5] ?>>
                                        <label class="list-group-item" for="theme5">
                                            <img src="/app/img/users/theme/theme_5.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme6" value="6" <?php echo $formtheme[6] ?>>
                                        <label class="list-group-item" for="theme6">
                                            <img src="/app/img/users/theme/theme_6.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme7" value="7" <?php echo $formtheme[7] ?>>
                                        <label class="list-group-item" for="theme7">
                                            <img src="/app/img/users/theme/theme_7.jpg">
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input class="form-check-input visually-hidden" type="radio" name="theme" id="theme8" value="0" <?php echo $formtheme[8] ?>>
                                        <label class="list-group-item" for="theme8">
                                            <img src="/app/img/users/theme/theme_empty.jpg">
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary col-md-6 mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="person-rightbar-bar">
                        <div class="person-setting-bg person-setting-bar">
                            <ul>
                                <li>
                                    <a href="#password" class="link">
                                        Пароль
                                    </a>
                                </li>
                                <li>
                                    <a href="#data" class="link">
                                        Личные данные
                                    </a>
                                </li>
                                <li>
                                    <a href="#info" class="link">
                                        Сведения
                                    </a>
                                </li>
                                <li>
                                    <a href="#notifications" class="link">
                                        Уведомления
                                    </a>
                                </li>
                                <li>
                                    <a href="#icon" class="link">
                                        Фотография
                                    </a>
                                </li>
                                <li>
                                    <a href="#cap" class="link">
                                        Обложка
                                    </a>
                                </li>
                                <li>
                                    <a href="#theme" class="link">
                                        Тема
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="person-setting-bg person-setting-bar d-flex align-items-center">
                            <svg class="svg-normal me-3" width="16" height="16">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#question-circle"></use>
                            </svg>
                            <a href="/about/faq/#подтверждение-аккаунта" class="link">
                                Подтверждение аккаунта
                            </a>
                        </div>
                        <?php if ($user["emailverify"] == 1) : ?>
                            <div class="person-setting-bg person-setting-bar d-flex align-items-center">
                                <svg class="svg-normal me-3" width="16" height="16">
                                    <use xlink:href="/app/img/icons/bootstrap.min.svg#eye"></use>
                                </svg>
                                <a href="/user/?id=<?php echo $user["id"] ?>" class="link">
                                    Профиль со стороны
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if (empty($secondemail)) : ?>
                            <div class="person-setting-bg person-setting-bar d-flex align-items-center">
                                <svg class="svg-normal me-3" width="16" height="16">
                                    <use xlink:href="/app/img/icons/bootstrap.svg#arrow-repeat"></use>
                                </svg>
                                <a href="/add-account/" class="link">
                                    Добавить аккаунт
                                </a>
                            </div>
                        <?php endif; ?>
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

    <?php include_once "../app/php/footer.php"; ?>

    <script src="/app/js/button.js"></script>
    <script src="/app/js/form-edit-url.js"></script>
    <script src="/app/js/person-settingschange.js"></script>

</body>

</html>
