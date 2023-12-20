<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}

if ($find[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$posts = R::getAll(SqlRequestFeed());
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Лента | Аквариум</title>

<style>
    @media(max-width: 991px) {
        .col-md-5 {
            display: none !important;
        }

        .col-md-7 {
            width: 100% !important;
        }
    }
</style>

<link rel="stylesheet" href="/app/css/modules/fancybox.css" />

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">


            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="col-md-7">
                        <?php foreach ($posts as $post) : ?>
                            <?php
                            $i++;
                            $posturl = "/post/?a=" . $post["iduser"] . "&p=" . $post["idpost"];
                            $postinurl = "/post/in/?a=" . $post["iduser"] . "&p=" . $post["idpost"];
                            $postuser = R::getAll(SqlRequestFindId($post["iduser"]));
                            if (count($postuser) > 0) {
                                $postuser = $postuser[0];
                                $username = $postuser["displaynick"] ? $postuser["nickname"] : ($postuser["firstName"] . " " . $postuser["lastName"]);
                                $userlogo = "/app/img/users/icons/" . ($postuser["ismale"] ? "MAN" : "WOMAN") . $postuser["logoid"] . ".png";
                            }
                            ?>
                            <div class="col-md-8 mb-2 mx-auto">
                                <a href="<?php echo $postinurl ?>" dataurl="<?php echo $posturl ?>" id="openpost-<?php echo $i ?>" onClick="OpenPost('openpost-<?php echo $i ?>')" data-fancybox data-type="iframe" data-width="1000" data-height="470" class="card card--link card--rounded person-posts-pc">
                                    <img src="/app/img/posts/posts-<?php echo max(1, intval($post["idpost"]) % 6); ?>.jpg" class="card-img" alt="Alt text">
                                    <div class="d-flex card-img-overlay card--bg-gradient">
                                        <div class="d-flex mt-auto flex-column card--title-1-padding">
                                            <p class="card-title text-white card--title card--title-1">
                                                <?php echo ClearMiniPostUser($post["minipost"]) ?>
                                            </p>
                                            <div class="text-white d-flex align-items-center">
                                                <img src="<?php echo $userlogo ?>" width="30" class="rounded-circle" alt="<?php echo $username ?>">
                                                <span class="text-white ms-2" style="font-family: NeueMachina">
                                                    <?php echo $username ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex card-img-overlay card--bg-gradient-2">
                                        <div class="d-flex mt-auto flex-column card--title-1-padding">
                                            <p class="card-title card--title card--title-1" style="color: <?php echo ContrastColor(ActionColorOfImage("../app/img/posts/posts-" . max(1, intval($post["idpost"]) % 6) . ".jpg")) ?> !important;">
                                                <?php echo ClearMiniPostUser($post["minipost"]) ?>
                                            </p>
                                            <div class="text-white d-flex align-items-center">
                                                <img src="<?php echo $userlogo ?>" width="30" class="rounded-circle" alt="<?php echo $username ?>">
                                                <span class="ms-2" style="font-family: NeueMachina; color: <?php echo ContrastColor(ActionColorOfImage("../app/img/posts/posts-" . max(1, intval($post["idpost"]) % 6) . ".jpg")) ?> !important;">
                                                    <?php echo $username ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="<?php echo $posturl ?>" class="card card--link card--rounded person-posts-mobile">
                                    <img src="/app/img/posts/posts-<?php echo max(1, intval($post["idpost"]) % 6); ?>.jpg" class="card-img" alt="Alt text">
                                    <div class="d-flex card-img-overlay card--bg-gradient">
                                        <div class="d-flex mt-auto flex-column card--title-1-padding">
                                            <p class="card-title text-white card--title card--title-1">
                                                <?php echo ClearMiniPostUser($post["minipost"]) ?>
                                            </p>
                                            <div class="text-white d-flex align-items-center">
                                                <img src="<?php echo $userlogo ?>" width="30" class="rounded-circle" alt="<?php echo $username ?>">
                                                <span class="text-white ms-2" style="font-family: NeueMachina">
                                                    <?php echo $username ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex card-img-overlay card--bg-gradient-2">
                                        <div class="d-flex mt-auto flex-column card--title-1-padding">
                                            <p class="card-title card--title card--title-1" style="color: <?php echo ContrastColor(ActionColorOfImage("../app/img/posts/posts-" . max(1, intval($post["idpost"]) % 6) . ".jpg")) ?> !important;">
                                                <?php echo ClearMiniPostUser($post["minipost"]) ?>
                                            </p>
                                            <div class="text-white d-flex align-items-center">
                                                <img src="<?php echo $userlogo ?>" width="30" class="rounded-circle" alt="<?php echo $username ?>">
                                                <span class="ms-2" style="font-family: NeueMachina; color: <?php echo ContrastColor(ActionColorOfImage("../app/img/posts/posts-" . max(1, intval($post["idpost"]) % 6) . ".jpg")) ?> !important;">
                                                    <?php echo $username ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-5">
                        <div class="person-setting-bg person-setting-bar">
                            <ul>
                                <li>
                                    <a href="#" class="link">
                                        Список
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="person-setting-bg person-setting-bar d-flex align-items-center">
                            <svg class="svg-normal me-3" width="16" height="16">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#question-circle"></use>
                            </svg>
                            <a href="#" class="link">
                                Информация
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>

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
