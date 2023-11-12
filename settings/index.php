<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/pages/main.css">

<title>Настройки аккаунта | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Настройки</h1>
            <div class="container px-0">
                <div class="row row-cols-1 g-2">
                    <div class="col-md-8">
                        <div class="person-setting-bg person-setting-content">
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg height="32" width="32" class="me-3" fill="dark">
                                    <use xlink:href="/app/img/icons/bootstrap.svg#cone-striped"></use>
                                </svg>
                                <span>
                                    Ваш аккаунт не подтвержден, введите <span class="dashed">имя</span>, <span class="dashed">фамилию</span>,
                                    <span class="dashed">никнейм</span> и <a href="/api/php/send-verify-email.php" class="link">подтвердите почту</a>.
                                </span>
                            </div>
                            <h2 id="data">Личные данные</h2>
                            <form class="needs-validation col-md-6" action="?" method="post" novalidate>
                                <div>
                                    <input class="form-control" type="text" name="name1" placeholder="Имя" aria-label="Имя" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите имя.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="name2" placeholder="Фамилия" aria-label="Фамилия" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите фамилию.
                                    </div>
                                </div>
                                <div>
                                    <input class="form-control" type="text" name="nickname" placeholder="Никнейм" aria-label="Никнейм" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите уникальный никнейм.
                                    </div>
                                    <p class="form-more">
                                        Уникальное короткое имя.
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="icon">Фотография</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary col-md-6 mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                            <hr>
                            <h2 id="cap">Обложка</h2>
                            <form class="needs-validation" action="?" method="post" novalidate>
                                <div>
                                    ...
                                </div>
                                <button class="btn btn-primary col-md-6 mt-2" type="submit">
                                    Сохранить изменения
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="person-setting-bg person-setting-bar">
                            <ul>
                                <li>
                                    <a href="#data">
                                        Личные данные
                                    </a>
                                </li>
                                <li>
                                    <a href="#icon">
                                        Фотография
                                    </a>
                                </li>
                                <li>
                                    <a href="#cap">
                                        Обложка
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
