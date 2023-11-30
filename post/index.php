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
    $urlback = ($author["email"] == $_SESSION["login"]) ? "/person" : "/user/?id=" . $author["id"];
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
            <a href="<?php echo $urlback ?>" class="person-post-back link col-md-1">
                <svg>
                    <use xlink:href="/app/img/icons/bootstrap.svg#chevron-left"></use>
                </svg>
                <span>Назад</span>
            </a>
            <?php if ($post == false) : ?>
                <h1>Запись не найдена</h1>
                <p>На главную страницу через 3 сек.</p>
                <script>
                    setTimeout(function() {
                        window.location.href = '/';
                    }, 3000);
                </script>
            <?php else : ?>
                <div class="row row-cols-1 g-2 person-post-content">
                    <div class="col-md-6 person-post-content-img">
                        <img src="/app/img/posts/posts-<?php echo max(1, intval($post["idpost"]) % 6) ?>.jpg" alt="">
                    </div>
                    <div class="col-md-5 person-post-content-post">
                        <div class="person-post-header">
                            <img src="/app/img/users/icons/<?php echo $logo ?>" alt="">
                            <span>
                                Даниил Дыбка
                            </span>
                        </div>
                        <p>
                            Здесь указано содержимое записи.
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
