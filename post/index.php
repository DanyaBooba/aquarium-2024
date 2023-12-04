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

$postinfo = [
    "author" => intval($_GET["a"]),
    "post" => intval($_GET["p"])
];

$post = R::getAll(SqlRequestFindCurrentPost($postinfo["author"], $postinfo["post"]));

if (count($post) <= 0) {
    $post = false;
} else {
    $post = $post[0];
    $author = R::getAll(SqlRequestFindId($postinfo["author"]))[0];
    $logo = ($author["ismale"] == 1 ? "MAN" : "WOMAN") . $author["logoid"] . ".png";
}
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Пост | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content person-post">
            <?php if ($post == false) : ?>
                <h1>Запись не найдена</h1>
                <p>На главную страницу через 3 сек.</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 3000);
                </script>
            <?php else : ?>
                <link rel="stylesheet" href="/app/css/fancybox.css" />

                <div class="row row-cols-1 g-2 person-post-content">
                    <div class="col-md-6 person-post-content-img" style="background-image: url('/app/img/posts/posts-<?php echo max(1, intval($post["idpost"]) % 6) ?>.jpg')">
                        <button class="btn">
                            <svg height="28" width="28">
                                <use xlink:href="/app/img/icons/bootstrap.svg#fullscreen"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="col-md-5 person-post-content-post">
                        <div class="person-post-header">
                            <div class="person-post-header-content">
                                <a href="/user/?id=1" class="link">
                                    Даниил Дыбка
                                </a>
                            </div>
                        </div>
                        <div class="person-post-content">
                            <div class="person-post-content-user">
                                <a href="/user/?id=1">
                                    <img src="/app/img/users/icons/<?php echo $logo ?>" alt="Даниил Дыбка">
                                </a>
                                <div class="post-content-user-content">
                                    <span title="Даниил Дыбка" aria-label="Даниил Дыбка">
                                        <a href="/user/?id=1" class="link">
                                            Даниил Дыбка
                                        </a>
                                    </span>
                                    <p>
                                        Содержимое записи с моих слов...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="person-post-bottom">
                            <div class="person-post-bottom-content">
                                <button class="btn">
                                    <svg height="28" width="28">
                                        <use xlink:href="/app/img/icons/bootstrap.svg#heart"></use>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg height="28" width="28">
                                        <use xlink:href="/app/img/icons/bootstrap.svg#send"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <a data-fancybox="gallery" data-src="/app/img/users/bg/BG1.jpg">
                        <img src="/app/img/users/bg/BG1.jpg" width="400" alt="" style="display: block;" />
                    </a>
                    <a data-fancybox="gallery" data-src="/app/img/users/bg/BG2.jpg">
                        <img src="/app/img/users/bg/BG2.jpg" width="400" alt="" style="display: block;" />
                    </a>
                    <a data-fancybox="gallery" data-src="/app/img/users/bg/BG3.jpg">
                        <img src="/app/img/users/bg/BG3.jpg" width="400" alt="" style="display: block;" />
                    </a>
                </div>

                <div>
                    <p>
                        <a href="data:text/html,<p>Some HTML</p>" data-fancybox data-type="iframe" data-width="600" data-height="400">
                            Load data
                        </a>
                    </p>
                </div>

                <script src="/app/js/fancybox.umd.js"></script>
                <script>
                    Fancybox.bind("[data-fancybox]", {});
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

            <?php endif; ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
