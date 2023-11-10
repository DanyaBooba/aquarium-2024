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
                            <h2 id="data">Личные данные</h2>
                            <form class="needs-validation col-md-6" action="?" method="post" novalidate>
                                <div>
                                    <input class="form-control" type="email" name="email" placeholder="Имя" aria-label="Имя" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите почту.
                                    </div>
                                    <p class="form-more">
                                        Используется для авторизации.
                                    </p>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="password" placeholder="Фамилия" aria-label="Фамилия" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, введите пароль.
                                    </div>
                                    <p class="form-more">
                                        Можно восстановить после регистрации.
                                    </p>
                                </div>
                                <div>
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Никнейм" aria-label="Никнейм" required>
                                    <div class="invalid-feedback">
                                        Пожалуйста, подтвердите введеный пароль.
                                    </div>
                                    <p class="form-more">
                                        Повторите введенный вами пароль.
                                    </p>
                                </div>
                                <button class="btn btn-primary w-100 mt-2" type="submit">
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
