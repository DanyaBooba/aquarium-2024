<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../app/php/content/head.php"; ?>

<link rel="stylesheet" href="/app/css/pages/main.css">

<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/content/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Уведомления</h1>
            <button class="btn btn-primary mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#not1" aria-expanded="false" aria-controls="not1">
                Спасибо за регистрацию!
            </button>
            <div class="collapse pb-2 border-bottom" id="not1">
                Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
            </div>
        </div>
    </main>

    <?php include_once "../app/php/content/footer.php"; ?>
</body>

</html>
