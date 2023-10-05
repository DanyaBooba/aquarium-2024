<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "app/php/content/head.php"; ?>

<title>Начальная страница</title>

<body class="container">
    <div class="see-at-pc">
        <?php include_once "app/php/content/header.php"; ?>
    </div>

    <main>
        <div class="row align-items-center">
            <div class="col-md-6 see-at-pc d-flex justify-content-end">
                <div class="p-3 d-flex">
                    <a href="#" aria-label="Скачать для Android" style="margin-right: -30px">
                        <img src="/app/img/content/mainpage/android.png" class="img-fluid" width="200">
                    </a>
                    <a href="#" aria-label="Скачать для iOS">
                        <img src="/app/img/content/mainpage/iphone.png" class="img-fluid" width="220">
                    </a>
                </div>
            </div>
            <div class="page-login">
                <div class="page-login--content">
                    <img src="/app/img/logo/aquarium.svg" alt="Логотип Аквариума">
                    <h3>Вход</h3>
                    <form action="/api/php/login.php" method="post">
                        <input class="form-control" type="email" name="email" placeholder="Почта" aria-label="Почта">
                        <input class="form-control" type="password" name="password" placeholder="Пароль" aria-label="Пароль">
                        <button class="btn btn-primary button-login-success" type="submit" style="margin-top: 15px;">
                            Войти
                        </button>
                    </form>
                </div>
                <div class="page-login--content">
                    <button class="btn btn-success button-login-success" type="submit">
                        Зарегистрироваться
                    </button>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "app/php/content/bottom/footer-content.php"; ?>

    <?php include_once "app/php/content/bottom/javascript.php"; ?>
</body>

</html>
