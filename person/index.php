<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/pages/main.css">

<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <div class="person-profile-bg" style="background-image: url('/app/img/users/bg/BG1.jpg');">
                <img src="/app/img/users/icons/MAN1.jpg">
            </div>
            <div class="person-profile">
                <div class="person-profile-content">
                    <div class="person-profile-content-name">
                        <p class="person-profile-content-name-1">
                            Даниил Дыбка
                        </p>
                        <p class="person-profile-content-name-2">
                            Описание профиля
                        </p>
                    </div>
                    <div class="person-profile-content-buttons">
                        <button class="btn btn-primary">
                            Редактировать профиль
                        </button>
                        <button class="btn btn-primary">
                            Ещё
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
