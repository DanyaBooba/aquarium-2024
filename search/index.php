<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) > 0) {
    if ($find[0]["isblock"] == 1) {
        header("Location: /block/");
        die();
    }
}

$search = @ClearSearch($_GET["s"]);
$seak = (mb_strlen($search) > 0) ? SqlRequestSearch($search) : SqlRequestSelectAll();

$look = ceil(count(R::getAll($seak)) / 100);
$page = @(empty(intval($_GET["p"])) || $_GET["p"] < 0 || $_GET["p"] > $look) ? 1 : intval($_GET["p"]);

$offset = ($page - 1) * 100;
$users = (mb_strlen($search) > 0) ? R::getAll(SqlRequestSearchOffset($search, $offset)) : R::getAll(SqlRequestSearchData($offset));

$btnnext = $page >= $look ? "disabled" : "";
$btnprev = $page == 1 ? "disabled" : "";
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Поиск | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Поиск</h1>
            <div class="person-form">
                <form action="?" method="get">
                    <div class="input-group">
                        <input type="text" name="s" value="<?php echo $search ?>" class="form-control" aria-label="Например, имя пользователя @dybka" placeholder="Найти, например имя пользователя @dybka">
                    </div>
                </form>
            </div>
            <div class="person-search-list list-group">
                <ul class="list-group list-group-flush">
                    <?php if (count($users) > 0) : ?>
                        <?php foreach ($users as $user) : ?>
                            <a href="/user/?id=<?php echo $user["id"] ?>" class="list-group-item list-group-item-action">
                                <img src="/app/img/users/icons/<?php echo ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] ?>.png" alt="<?php echo $user["nickname"] ?>">
                                <span title="123" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;text-align: center;">
                                    <?php if ($user["displaynick"] == 1) : ?>
                                        <?php echo $user["nickname"] ?>
                                    <?php else : ?>
                                        <?php echo $user["firstName"] . " " . $user["lastName"] ?>
                                    <?php endif ?>
                                </span>
                                <?php if ($user["accverify"] == 1) : ?>
                                    <span class="col-md-1">
                                        <svg class="person-verify-account-min">
                                            <use xlink:href="/app/img/icons/bootstrap.svg#check-circle-fill"></use>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                            </a>
                        <?php endforeach ?>
                    <?php else : ?>
                        <p class="text-center">По запросу ничего не найдено.</p>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="person-search-pagination">
                <button class="btn btn-outline-primary" onClick="SearchPrev()" <?php echo $btnprev ?>>
                    <svg class="me-1">
                        <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-left"></use>
                    </svg>
                    Предыдущая
                </button>
                <button class="btn btn-outline-primary" onClick="SearchNext()" <?php echo $btnnext ?>>
                    Следующая
                    <svg class="ms-1">
                        <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-right"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div id="search-page" class="d-none"><?php echo $page ?></div>
        <div id="search-look" class="d-none"><?php echo $look ?></div>
        <div id="search-get" class="d-none"><?php echo $_GET["s"] ?></div>
    </main>

    <script src="/app/js/person-search.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
