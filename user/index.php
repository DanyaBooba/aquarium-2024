<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

##
## Me
##

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}

if ($find[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$find = $find[0];

##
## User
##

$user = R::getAll(SqlRequestFindId(empty($_GET["id"]) == false ? $_GET["id"] : 0));

if (count($user) <= 0) {
    $user = false;
} else if ($user[0]["emailverify"] == 0) {
    $user = false;
} else {
    $user = $user[0];
    $logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".png";
    $bg = "BG" . $user["capid"] . ".jpg";

    $buttonsubs = $find["id"] == $user["id"] ? "disabled" : "";
    $isubs = in_array(intval($user["id"]), json_decode($find["isubs"]));
    $atmesubs = in_array(intval($find["id"]), json_decode($user["isubs"]));
    $subs = $isubs ? "Подписан" : "Подписаться";
    $subslogo = $isubs ? "check" : "plus";

    # At me sub

    $subatme = array_unique(json_decode($user["atmesubs"]));
    $countsubatme = count($subatme);

    $userssubatme = [];
    for ($i = 0; $i < $countsubatme; $i++) {
        array_push($userssubatme, R::getAll(SqlRequestFindId(intval($subatme[$i])))[0]);
    }

    $isdisabledsubatme = $countsubatme > 0 ? "" : "disabled";

    # Sub me

    $subme = array_unique(json_decode($user["isubs"]));
    $countsubme = count($subme);

    $userssubme = [];
    for ($i = 0; $i < $countsubme; $i++) {
        array_push($userssubme, R::getAll(SqlRequestFindId(intval($subme[$i])))[0]);
    }

    $isdisabledsubme = $countsubme > 0 ? "" : "disabled";

    # Achivs

    $achivs = array_unique(json_decode($user["achivs"]));
    $countachivs = count($achivs);

    $achivsblock = [];
    for ($i = 0; $i < $countachivs; $i++) {
        array_push($achivsblock, R::getAll(SqlRequestFindAchivs(intval($achivs[$i])))[0]);
    }

    $posts = R::getAll(SqlRequestFindPostsEmail($user["email"]));
    $background = intval($user["themeid"]) != 0 ? "background-" . $user["themeid"] : "";

    $form = [
        "achivs" => FormOfWord($countachivs, "Достижение", "Достижения", "Достижений"),
        "subs" => FormOfWord($countsubme, "Подписка", "Подписки", "Подписок"),
        "atmesubs" => FormOfWord($countsubatme, "Подписчик", "Подписчика", "Подписчиков"),
    ];
}
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<body class="container <?php echo $background ?>">
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
                <?php if ($find["emailverify"] == 0) : ?>
                    <div class="alert alert-warning d-flex align-items-center">
                        <svg height="32" width="32" class="me-3 svg-normal see-at-pc">
                            <use xlink:href="/app/img/icons/bootstrap.min.svg#cone-striped"></use>
                        </svg>
                        <span>
                            Аккаунт не подтвержден, Вас не видят другие пользователи.
                            <a href="/api/php/person/send-verify.php" class="link">Отправить письмо для подтверждения?</a>
                        </span>
                    </div>
                <?php endif; ?>
                <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/<?php echo $bg ?>');">
                    <img src="/app/img/users/icons/<?php echo $logo ?>">
                </div>
                <div class="person-profile">
                    <div class="person-profile-content">
                        <div class="person-profile-content-name">
                            <?php if ($user["emailverify"] == 1 && $user["displaynick"] == 0) : ?>
                                <p class="person-profile-content-name-1 content-name-width" title="<?php echo $user["firstName"] . " " . $user["lastName"] ?>">
                                    <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                </p>
                            <?php else : ?>
                                <p class="person-profile-content-name-1 content-name-width" title="<?php echo $user["nickname"] ?>">
                                    <?php echo $user["nickname"] ?>
                                </p>
                            <?php endif ?>
                            <?php if (mb_strlen($user["descr"]) > 0) : ?>
                                <p class="person-profile-content-name-2 content-name-width" title="<?php echo $user["descr"] ?>">
                                    <?php echo $user["descr"] ?>
                                </p>
                            <?php endif ?>
                            <div class="person-profile-subs">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalFriends" title="Кто подписан" <?php echo $isdisabledsubatme ?>>
                                    <b><?php echo $countsubatme ?></b> <?php echo $form["atmesubs"] ?>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalSubs" title="На кого подписан" <?php echo $isdisabledsubme ?>>
                                    <b><?php echo $countsubme ?></b> <?php echo $form["subs"] ?>
                                </button>
                                <?php if ($countachivs > 0) : ?>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAchivs" title="Достижения">
                                        <b><?php echo $countachivs ?></b> <?php echo $form["achivs"] ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="person-profile-content-buttons person-profile-content-buttons-width">
                            <?php if ($find["emailverify"] == 1) : ?>
                                <button onClick="Subscribe()" class="btn btn-secondary d-flex align-items-center justify-content-center" <?php echo $buttonsubs ?>>
                                    <svg class="me-1" fill="white" width="26" height="26">
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#<?php echo $subslogo ?>"></use>
                                    </svg>
                                    <?php echo $subs ?>
                                </button>
                                <?php if ($isubs && $atmesubs) : ?>
                                    <button onClick="MailTo()" class="btn btn-secondary ms-2" style="width: 52px;">
                                        <svg fill="white" width="26" height="26">
                                            <use xlink:href="/app/img/icons/bootstrap.min.svg#envelope"></use>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin-bottom: 100px">
                    У пользователя нет записей.
                </div>
                <div class="d-none" id="person-id"><?php echo $user["id"] ?></div>
                <script src="/app/js/person-user.js"></script>
            <?php endif ?>
        </div>
    </main>

    <?php if ($countsubatme > 0) : ?>
        <div class="modal fade" id="modalFriends" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content person-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalLabel">Подписчики</h3>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($userssubatme as $user) : ?>
                                <a href="/user/?id=<?php echo $user['id'] ?>" class="list-group-item list-group-item-action">
                                    <img src="/app/img/users/icons/<?php echo ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] ?>.png" alt="<?php echo $user["nickname"] ?>">
                                    <?php if ($user["displaynick"] == 1) : ?>
                                        <?php echo $user["nickname"] ?>
                                    <?php else : ?>
                                        <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                    <?php endif ?>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($countsubme > 0) : ?>
        <div class="modal fade" id="modalSubs" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content person-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalLabel">Подписан</h3>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($userssubme as $user) : ?>
                                <a href="/user/?id=<?php echo $user['id'] ?>" class="list-group-item list-group-item-action">
                                    <img src="/app/img/users/icons/<?php echo ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] ?>.png" alt="<?php echo $user["nickname"] ?>">
                                    <?php if ($user["displaynick"] == 1) : ?>
                                        <?php echo $user["nickname"] ?>
                                    <?php else : ?>
                                        <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                    <?php endif ?>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($countachivs > 0) : ?>
        <div class="modal fade" id="modalAchivs" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content person-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalLabel">Достижения</h3>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($achivsblock as $achiv) : ?>
                                <li class="list-group-item">
                                    <img src="/app/img/achivs/<?php echo $achiv["nameimg"] ?>.jpg" alt="<?php echo $achiv["name"] ?>">
                                    «<?php echo $achiv["name"] ?>»
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
