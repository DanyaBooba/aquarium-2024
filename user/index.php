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

##
## User
##

$user = R::getAll(SqlRequestFindId($_GET["id"]));

if (count($user) <= 0) {
    $user = false;
} else {
    $user = $user[0];
    $logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".jpg";
    $bg = "BG" . $user["capid"] . ".jpg";
}
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
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
                            <?php if ($user["emailverify"] == 1 && $user["firstName"] != "" && $user["lastName"] != "") : ?>
                                <p class="person-profile-content-name-1">
                                    <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                </p>
                            <?php else : ?>
                                <p class="person-profile-content-name-1">
                                    <?php echo $user["nickname"] ?>
                                </p>
                            <?php endif ?>
                            <?php if ($user["descr"] > 0) : ?>
                                <p>
                                    <?php echo $user["descr"] ?>
                                </p>
                            <?php endif ?>
                        </div>
                        <!-- <div class="person-profile-content-buttons">
                        <button onClick="ButtonLeftBar(6)" class="btn btn-secondary">
                            Редактировать профиль
                        </button>
                    </div> -->
                    </div>
                </div>
                <div class="text-center">
                    У пользователя нет записей.
                </div>
            <?php endif ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
