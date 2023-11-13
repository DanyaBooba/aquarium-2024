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
## Server
##

$look = ceil(count(R::getAll(SqlRequestSelectAll())) / 100);
$page = (empty(intval($_GET["p"])) || $_GET["p"] < 0 || $_GET["p"] > $look) ? 1 : intval($_GET["p"]);

$offset = ($page - 1) * 100;
$users = R::getAll("SELECT * FROM `users` WHERE (emailverify=1 AND fullacc=1) LIMIT $offset, 100");

$btnnext = $page == $look ? "disabled" : "";
$btnprev = $page == 1 ? "disabled" : "";
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Поиск | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Поиск</h1>
            <!-- <div class="person-form">
                <form action="?" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" aria-label="Например, имя пользователя @dybka" placeholder="Например, имя пользователя @dybka">
                    </div>
                </form>
            </div> -->
            <div class="person-search-list list-group">
                <ul class="list-group list-group-flush">
                    <?php foreach ($users as $user) : ?>
                        <a href="/user/?id=<?php echo $user["id"] ?>" class="list-group-item list-group-item-action">
                            <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                            <?php if (strlen($user["firstName"]) < 1 || strlen($user["lastName"]) < 1) : ?>
                                <?php echo $user["nickname"] ?>
                            <?php else : ?>
                                <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                            <?php endif ?>
                        </a>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="person-search-pagination">
                <button class="btn btn-outline-primary" onClick="SearchPrev()" <?php echo $btnprev ?>>
                    <svg class="me-1">
                        <use xlink:href="/app/img/icons/bootstrap.svg#chevron-left"></use>
                    </svg>
                    Предыдущая
                </button>
                <button class="btn btn-outline-primary" onClick="SearchNext()" <?php echo $btnnext ?>>
                    Следующая
                    <svg class="ms-1">
                        <use xlink:href="/app/img/icons/bootstrap.svg#chevron-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div id="search-page" class="d-none"><?php echo $page ?></div>
        <div id="search-look" class="d-none"><?php echo $look ?></div>
    </main>

    <script src="/app/js/person-search.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
