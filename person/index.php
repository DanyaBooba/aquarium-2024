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
                        <button onClick="ButtonLeftBar(4)" class="btn btn-primary me-2">
                            Редактировать профиль
                        </button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#desc">
                            Ещё
                            <svg height="22" width="22" fill="white">
                                <use xlink:href="/app/img/icons/bootstrap.svg#chevron-down"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="desc" tabindex="-1" aria-labelledby="descLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <p class="modal-title fs-5 h1 mb-0" id="descLabel">Подробная информация</p>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <svg height="22" width="22" class="svg-normal">
                            <use xlink:href="/app/img/icons/bootstrap.svg#x-lg"></use>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
