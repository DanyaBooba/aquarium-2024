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
$logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".png";
$bg = "BG" . $user["capid"] . ".jpg";

# Sub me

$subme = array_unique(json_decode($user["isubs"]));
$countsubme = count($subme);

$userssubme = [];
for ($i = 0; $i < $countsubme; $i++) {
    $userfind = R::getAll(SqlRequestFindId(intval($subme[$i])));
    if (count($userfind) > 0) {
        array_push($userssubme, $userfind[0]);
    }
}

$isdisabledsubme = $countsubme > 0 ? "" : "disabled";

$submecopy = $subme;
$submeimage = [];
if ($countsubme > 0) {
    for ($i = 0; $i < min(2, $countsubme); $i++) {
        $index = random_int(0, count($submecopy) - 1);
        $userid = $submecopy[$index];
        $useridfind = R::getAll(SqlRequestFindId($submecopy[$index]));

        if (count($useridfind) > 0) {
            array_push($submeimage, ($useridfind[0]["ismale"] == 1 ? "MAN" : "WOMAN") . $useridfind[0]["logoid"]);
        } else {
            array_push($submeimage, (random_int(0, 1) == 1 ? "MAN" : "WOMAN") . random_int(1, 5));
        }

        array_splice($submecopy, $index, 1);
    }
}

# Sub at me

$subatme = array_unique(json_decode($user["atmesubs"]));
$countsubatme = count($subatme);

$userssubatme = [];
for ($i = 0; $i < $countsubatme; $i++) {
    $userfind = R::getAll(SqlRequestFindId(intval($subatme[$i])));
    if (count($userfind) > 0) {
        array_push($userssubatme, $userfind[0]);
    }
}

$isdisabledsubatme = $countsubatme > 0 ? "" : "disabled";

$subatmecopy = $subatme;
$subatmeimage = [];
if ($countsubatme > 0) {
    for ($i = 0; $i < min(2, $countsubatme); $i++) {
        $index = random_int(0, count($subatmecopy) - 1);
        $userid = $subatmecopy[$index];
        $useridfind = R::getAll(SqlRequestFindId($subatmecopy[$index]));

        if (count($useridfind) > 0) {
            array_push($subatmeimage, ($useridfind[0]["ismale"] == 1 ? "MAN" : "WOMAN") . $useridfind[0]["logoid"]);
        } else {
            array_push($subatmeimage, (random_int(0, 1) == 1 ? "MAN" : "WOMAN") . random_int(1, 5));
        }

        array_splice($subatmecopy, $index, 1);
    }
}

# Achivs

$achivs = array_unique(json_decode($user["achivs"]));
$countachivs = count($achivs);

$achivsblock = [];
for ($i = 0; $i < $countachivs; $i++) {
    array_push($achivsblock, R::getAll(SqlRequestFindAchivs(intval($achivs[$i])))[0]);
}

$posts = R::getAll(SqlRequestFindPostsEmail($user["email"]));
$background = intval($user["themeid"]) != 0 ? "background-" . $user["themeid"] : "";

$countposts = count($posts);
$countpoststext = FormOfWord($countposts, "пост", "поста", "постов");

$form = [
    "achivs" => FormOfWord($countachivs, "Достижение", "Достижения", "Достижений"),
    "subs" => FormOfWord($countsubme, "Подписка", "Подписки", "Подписок"),
    "atmesubs" => FormOfWord($countsubatme, "Подписчик", "Подписчика", "Подписчиков"),
];
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<link rel="stylesheet" href="/app/css/modules/fancybox.css" />

<body class="container <?php echo $background ?>">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <?php if ($user["emailverify"] == 0) : ?>
                <div class="alert alert-warning d-flex align-items-center">
                    <svg height="32" width="32" class="me-3 svg-normal see-at-pc">
                        <use xlink:href="/app/img/icons/bootstrap.min.svg#cone-striped"></use>
                    </svg>
                    <span>
                        Аккаунт не подтвержден, Вас не видят другие пользователи.
                        <a href="/api/php/person/verify/send-verify.php" class="link">Отправить письмо для подтверждения?</a>
                    </span>
                </div>
            <?php endif ?>
            <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/<?php echo $bg ?>');">
                <img src="/app/img/users/icons/<?php echo $logo ?>">
            </div>
            <div class="person-profile">
                <div class="person-profile-content">
                    <div class="person-profile-content-name">
                        <div class="d-flex align-items-center">
                            <?php if ($user["emailverify"] == 1 && $user["displaynick"] == 0) : ?>
                                <p class="person-profile-content-name-1 content-name-width" title="<?php echo $user["firstName"] . " " . $user["lastName"] ?>">
                                    <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                </p>
                            <?php else : ?>
                                <p class="person-profile-content-name-1 content-name-width" title="<?php echo $user["nickname"] ?>">
                                    <?php echo $user["nickname"] ?>
                                </p>
                            <?php endif ?>
                            <?php if ($user["accverify"] == 1) : ?>
                                <svg class="person-verify-account">
                                    <use xlink:href="/app/img/icons/bootstrap.svg#check-circle-fill"></use>
                                </svg>
                            <?php endif; ?>
                        </div>
                        <?php if (mb_strlen($user["descr"]) > 0) : ?>
                            <p class="person-profile-content-name-2 content-name-width" title="<?php echo $user["descr"] ?>">
                                <?php echo $user["descr"] ?>
                            </p>
                        <?php endif ?>
                        <div class="person-profile-subs">
                            <button type="button" class="btn person-profile-subs-sub" data-bs-toggle="modal" data-bs-target="#modalFriends" title="Кто подписан" <?php echo $isdisabledsubatme ?>>
                                <?php if ($countsubatme > 0) : ?>
                                    <span>
                                        <?php for ($i = 0; $i < min(2, $countsubatme); $i++) : ?>
                                            <img src="/app/img/users/icons/<?php echo $subatmeimage[$i] ?>.png" width="20" class="rounded-circle" alt="Пользователь 1">
                                        <?php endfor; ?>
                                    </span>
                                <?php endif; ?>
                                <b><?php echo $countsubatme ?></b> <?php echo $form["atmesubs"] ?>
                            </button>
                            <button type="button" class="btn person-profile-subs-sub" data-bs-toggle="modal" data-bs-target="#modalSubs" title="На кого подписан" <?php echo $isdisabledsubme ?>>
                                <?php if ($countsubme > 0) : ?>
                                    <span>
                                        <?php for ($i = 0; $i < min(2, $countsubme); $i++) : ?>
                                            <img src="/app/img/users/icons/<?php echo $submeimage[$i] ?>.png" width="20" class="rounded-circle" alt="Пользователь 1">
                                        <?php endfor; ?>
                                    </span>
                                <?php endif; ?>
                                <b><?php echo $countsubme ?></b> <?php echo $form["subs"] ?>
                            </button>
                            <?php if ($countachivs > 0) : ?>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAchivs" title="Достижения">
                                    <b><?php echo $countachivs ?></b> <?php echo $form["achivs"] ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="person-profile-content-buttons person-profile-content-buttons-width flex-column h-100">
                        <?php if ($user["emailverify"] == 1) : ?>
                            <button onClick="ButtonLeftBar('add')" class="btn btn-primary mb-2">
                                Добавить пост
                            </button>
                        <?php endif; ?>
                        <button onClick="ButtonLeftBar('settings')" class="btn btn-secondary">
                            Редактировать
                        </button>
                    </div>
                </div>
            </div>
            <?php if (count($posts) > 0) : ?>
                <div class="row row-cols-1 g-2 person-posts">
                    <?php foreach ($posts as $post) : ?>
                        <div class="col-md-4">
                            <a href="<?php echo "/post/?a=" . $post["iduser"] . "&p=" . $post["idpost"] ?>" class="card">
                                <img src="/app/img/posts/posts-<?php echo max(1, intval($post["idpost"]) % 6); ?>.jpg" class="card-img" alt="<?php echo ClearMiniPostUser($post["minipost"]) ?>">
                                <div class="card-img-overlay person-posts-background">
                                    <div class="person-posts-content">
                                        <p class="card-title">
                                            <?php echo ClearMiniPostUser($post["minipost"]) ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <?php echo $countposts . " " . $countpoststext ?>.
                </div>
            <?php else : ?>
                <div class="text-center" style="margin-bottom: 100px;">
                    У пользователя нет записей.
                </div>
            <?php endif ?>
        </div>
    </main>

    <?php if ($countsubatme > 0) : ?>
        <div class="modal fade" id="modalFriends" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content person-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="modalLabel">Подписчики</h3>
                        <button type="button" class="btn modal-button-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($userssubatme as $user) : ?>
                                <a href="/user/?id=<?php echo $user['id'] ?>" class="list-group-item list-group-item-action">
                                    <img src="/app/img/users/icons/<?php echo ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] ?>.png" alt="<?php echo $user["nickname"] ?>" loading="lazy">
                                    <?php if ($user["displaynick"] == 1) : ?>
                                        <?php echo $user["nickname"] ?>
                                    <?php else : ?>
                                        <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                    <?php endif ?>
                                    <?php if ($user["accverify"] == 1) : ?>
                                        <svg class="person-verify-account-min">
                                            <use xlink:href="/app/img/icons/bootstrap.svg#check-circle-fill"></use>
                                        </svg>
                                    <?php endif; ?>
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
                        <button type="button" class="btn modal-button-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($userssubme as $user) : ?>
                                <a href="/user/?id=<?php echo $user['id'] ?>" class="list-group-item list-group-item-action">
                                    <img src="/app/img/users/icons/<?php echo ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] ?>.png" alt="<?php echo $user["nickname"] ?>" loading="lazy">
                                    <?php if ($user["displaynick"] == 1) : ?>
                                        <?php echo $user["nickname"] ?>
                                    <?php else : ?>
                                        <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                    <?php endif ?>
                                    <?php if ($user["accverify"] == 1) : ?>
                                        <svg class="person-verify-account-min">
                                            <use xlink:href="/app/img/icons/bootstrap.svg#check-circle-fill"></use>
                                        </svg>
                                    <?php endif; ?>
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
                        <button type="button" class="btn modal-button-close" data-bs-dismiss="modal" aria-label="Close">
                            <svg class="svg-normal" width="20" height="20">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#x-lg"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body person-search-list">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($achivsblock as $achiv) : ?>
                                <?php
                                $img = imageCreateFromJpeg("../app/img/achivs/" . $achiv["nameimg"] . ".jpg");

                                $width = ImageSX($img);
                                $height = ImageSY($img);

                                $thumb = imagecreatetruecolor(1, 1);
                                imagecopyresampled($thumb, $img, 0, 0, 0, 0, 1, 1, $width, $height);
                                $color = '#' . dechex(imagecolorat($thumb, 0, 0));

                                list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
                                ?>

                                <li class="list-group-item py-3">
                                    <img src="/app/img/achivs/<?php echo $achiv["nameimg"] ?>.jpg" alt="<?php echo $achiv["name"] ?>" style="box-shadow: 0 .5rem 1rem rgba(<?php echo $r . ", " . $g . ", " . $b ?>, .3);" loading="lazy">
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

    <script src="/app/js/person/openpost.js"></script>
    <script src="/app/js/modules/fancybox.js"></script>
    <script>
        Fancybox.bind("[data-fancybox]", {
            on: {
                "*": (fancybox, eventName) => {
                    if (eventName === "close") {
                        ClosePost();
                    }
                },
            },
        });

        Fancybox.bind('[data-fancybox="gallery"]', {
            Toolbar: {
                display: {
                    left: [
                        "infobar",
                    ],
                    middle: [],
                    right: [
                        "iterateZoom",
                        "download",
                        "close",
                    ],
                }
            },
            Images: {
                initialSize: "fit",
            },
        });
    </script>
</body>

</html>
