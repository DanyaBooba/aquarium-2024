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
    $authorname = ($author["displaynick"] == 1) ? ($author["nickname"]) : ($author["firstName"] . " " . $author["lastName"]);

    $postimage = [
        null,
        "/app/img/posts/posts-1.jpg",
        "/app/img/posts/posts-2.jpg",
        "/app/img/posts/posts-3.jpg",
    ];
}
?>

<?php include_once "../../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Часть поста | Аквариум</title>

<body>

    <main>

        <div class="person-content person-post">
            <?php if ($post == false) : ?>
                <h1>Запись не найдена</h1>
                <p>На главную страницу через 3 сек.</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 3000);
                </script>
            <?php else : ?>
                <link rel="stylesheet" href="/app/css/modules/fancybox.css" />

                <div class="row row-cols-1 person-post-content">
                    <div class="col-md-6 person-post-content-img">
                        <div id="carImage" class="carousel carousel-fade">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carImage" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carImage" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carImage" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo $postimage[1] ?>" class="d-block w-100" data-fancybox="gallery" data-src="<?php echo $postimage[1] ?>" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $postimage[2] ?>" class="d-block w-100" data-fancybox="gallery" data-src="<?php echo $postimage[2] ?>" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $postimage[3] ?>" class="d-block w-100" data-fancybox="gallery" data-src="<?php echo $postimage[3] ?>" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carImage" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Предыдущее</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carImage" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Следующее</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 person-post-content-post">
                        <div class="person-post-header">
                            <div class="person-post-header-content">
                                <a class="link-empty">
                                    <?php echo $authorname ?>
                                </a>
                            </div>
                        </div>
                        <div class="person-post-content-in">
                            <div class="person-post-content-user">
                                <a class="link-empty">
                                    <img src="/app/img/users/icons/<?php echo $logo ?>" alt="<?php echo $authorname ?>">
                                </a>
                                <div class="post-content-user-content w-75">
                                    <span title="<?php echo $authorname ?>" aria-label="<?php echo $authorname ?>">
                                        <a class="link-empty">
                                            <?php echo $authorname ?>
                                        </a>
                                    </span>
                                    <div>
                                        <?php echo $post["text"] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="person-post-bottom">
                            <div class="person-post-bottom-content">
                                <button class="btn">
                                    <svg height="28" width="28">
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#heart"></use>
                                    </svg>
                                </button>
                                <button class="btn">
                                    <svg height="28" width="28">
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#send"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="/app/js/modules/fancybox.js"></script>
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

    <?php include_once "../../app/php/bottom/javascript.php"; ?>
</body>

</html>
