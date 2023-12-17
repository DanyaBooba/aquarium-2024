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

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">


            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="col-md-7">
                        <?php for ($i = 0; $i < 15; $i++) : ?>
                            <div class="person-setting-bg person-setting-content">
                                <div class="d-flex flex-column">
                                    <div>
                                        <a href="">
                                            user
                                        </a>
                                    </div>
                                    <div>
                                        image
                                    </div>
                                    <div>
                                        post
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
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
</body>

</html>
