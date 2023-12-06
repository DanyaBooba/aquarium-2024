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

$nots = R::getAll(SqlRequestFindNotifications($find[0]["email"]));
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Уведомления | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content person-content-notifications-main">
            <h1>Уведомления</h1>

            <?php if (count($nots) > 0) : ?>
                <div class="accordion">
                    <?php for ($i = 1; $i <= count($nots); $i++) : ?>
                        <?php $k = $i;
                        $k--; ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notif-coll<?php echo $i ?>" aria-expanded="false" aria-controls="notif-coll<?php echo $i ?>">
                                    <?php echo $nots[$k]["name"] ?>
                                </button>
                            </h2>
                            <div id="notif-coll<?php echo $i ?>" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <?php echo $nots[$k]["descr"] ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php else : ?>
                <p>
                    Нет уведомлений.
                </p>
            <?php endif; ?>

        </div>
    </main>

    <script src="/app/js/person-notifications.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
