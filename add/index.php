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
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error = AddPostError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Добавить пост | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <div class="d-flex align-items-center mb-1">
                <svg class="svg-normal me-1" width="14" height="14">
                    <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-left"></use>
                </svg>
                <a href="/person/" class="link">
                    Назад
                </a>
            </div>
            <h1>Добавить пост</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="col-md-8">
                        <div class="person-setting-bg person-setting-content">
                            <form class="needs-validation" action="/api/php/person/add-post.php" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <textarea class="form-control" name="text" aria-label="Сообщение поста" placeholder="Сообщение поста" required></textarea>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите сообщение.
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Добавить пост
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 see-at-pc"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="/app/js/button.js"></script>
    <script src="/app/js/form-edit-url.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
