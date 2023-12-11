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

$idpost = @intval($_GET["p"]);
$post = R::getAll(SqlRequestFindPost($user["id"], $idpost));
if (count($post) <= 0) {
    $post = false;
} else {
    $post = $post[0];
}
?>

<?php include_once "../../app/php/head.php"; ?>

<?php $error = @AddPostError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Удалить пост | Аквариум</title>

<body class="container">
    <?php include_once "../../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">

            <?php if ($post == false) : ?>
                <h1>Запись не найдена</h1>
                <p>
                    Убедитесь, что запись существует.
                </p>
            <?php else : ?>
                <h1>Удалить пост</h1>
                <div class="container px-0">
                    <div class="person-setting row row-cols-1 g-2">
                        <div class="person-rightbar-content">
                            <div class="person-setting-bg person-block-add-post">
                                <form class="needs-validation" action="/api/php/person/delete-post.php" id="formPost" method="post" novalidate>
                                    <?php if (empty($error) == false) : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error ?>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <?php echo $post["text"] ?>
                                    </div>
                                    <input type="text" name="id" style="display: none;" value="<?php echo $_GET["p"] ?>">
                                    <button class="btn btn-danger w-100" type="submit">
                                        Удалить пост
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="person-rightbar-empty"></div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <script src="/app/js/person/leftbarbuttons.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../../app/php/footer.php"; ?>
</body>

</html>
