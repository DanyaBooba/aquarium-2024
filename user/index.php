<?php
session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

##
## Me
##

$find = R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}
$find = $find[0];

##
## User
##

$user = R::getAll(SqlRequestFindId(empty($_GET["id"]) == false ? $_GET["id"] : 0));

if (count($user) <= 0) {
    $user = false;
} else {
    $user = $user[0];
    $logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".jpg";
    $bg = "BG" . $user["capid"] . ".jpg";

    $buttonsubs = $find["id"] == $user["id"] ? "disabled" : "";
    $isubs = in_array(intval($user["id"]), json_decode($find["isubs"]));
    $subs = $isubs ? "Подписан" : "Подписаться";
    $subslogo = $isubs ? "check" : "plus";

    $atmesubs = in_array(intval($find["id"]), json_decode($user["isubs"]));

    $countsubatme = count(array_unique(json_decode($user["atmesubs"])));
    $countsubme = count(array_unique(json_decode($user["isubs"])));

    $countachivs = count(array_unique(json_decode($user["achivs"])));
}
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <?php if ($user == false) : ?>
                <h1>Пользователь не найден</h1>
                <p>Попробуйте изменить запрос.</p>
                <p>На страницу поиска через 3 сек.</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '/search/';
                    }, 3000);
                </script>
            <?php else : ?>
                <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/<?php echo $bg ?>');">
                    <img src="/app/img/users/icons/<?php echo $logo ?>">
                </div>
                <div class="person-profile">
                    <div class="person-profile-content">
                        <div class="person-profile-content-name">
                            <?php if ($user["emailverify"] == 1 && $user["displaynick"] == 0) : ?>
                                <p class="person-profile-content-name-1" title="<?php echo $user["firstName"] . " " . $user["lastName"] ?>">
                                    <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                </p>
                            <?php else : ?>
                                <p class="person-profile-content-name-1" title="<?php echo $user["nickname"] ?>">
                                    <?php echo $user["nickname"] ?>
                                </p>
                            <?php endif ?>
                            <?php if (mb_strlen($user["descr"]) > 0) : ?>
                                <p class="person-profile-content-name-2" title="<?php echo $user["descr"] ?>">
                                    <?php echo $user["descr"] ?>
                                </p>
                            <?php endif ?>
                            <div class="d-flex align-items-center mt-auto">
                                <div title="Кто подписан">
                                    <b><?php echo $countsubatme ?></b> Подписчики
                                </div>
                                <div class="ps-2" title="На кого подписан">
                                    <b><?php echo $countsubme ?></b> Подписан
                                </div>
                                <div class="ps-2" title="Достижения">
                                    <b><?php echo $countachivs ?></b> Достижений
                                </div>
                            </div>
                        </div>
                        <div class="person-profile-content-buttons">
                            <button onClick="Subscribe()" class="btn btn-secondary d-flex align-items-center justify-content-center" <?php echo $buttonsubs ?>>
                                <svg class="me-1" fill="white" width="26" height="26">
                                    <use xlink:href="/app/img/icons/bootstrap.svg#<?php echo $subslogo ?>"></use>
                                </svg>
                                <?php echo $subs ?>
                            </button>
                            <?php if ($isubs && $atmesubs) : ?>
                                <button onClick="MailTo()" class="btn btn-secondary ms-2" style="width: 52px;">
                                    <svg fill="white" width="26" height="26">
                                        <use xlink:href="/app/img/icons/bootstrap.svg#envelope"></use>
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="person-posts-empty">
                    У пользователя нет записей.
                </div>
                <div class="d-none" id="person-id"><?php echo $user["id"] ?></div>
                <script src="/app/js/person-user.js"></script>
            <?php endif ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
