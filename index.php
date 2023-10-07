<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "app/php/content/head.php"; ?>

<title>Начальная страница | Аквариум</title>

<body class="container">
    <div class="see-at-pc">
        <?php include_once "app/php/content/header.php"; ?>
    </div>
    <main>
        <div class="row align-items-center">
            <div class="col-md-6 see-at-pc d-flex justify-content-end px-0">
                <div class="p-3 d-flex">
                    <a href="/download/#android" aria-label="Скачать для Android" style="margin-right: -30px">
                        <img src="/app/img/content/mainpage/android.png" class="img-fluid" width="240">
                    </a>
                    <a href="/download/#ios" aria-label="Скачать для iOS">
                        <img src="/app/img/content/mainpage/iphone.png" class="img-fluid" width="260">
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
                <div class="page-login--registation">
                    <a href="/registration/" class="btn btn-success button-login-success" type="submit">
                        Зарегистрироваться
                    </a>
                </div>
                <div class="page-login-privacy">
                    <div class="page-login-privacy--link">
                        <a href="/about/faq/#login" class="link">
                            Помочь со входом?
                        </a>
                    </div>
                    <div class="page-login-privacy--link">
                        Принимаете
                        <a href="/about/user/privacypolicy" class="link">
                            политику конфиденциальности
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "app/php/content/bottom/footer-content.php"; ?>

    <?php include_once "app/php/content/bottom/javascript.php"; ?>
</body>

</html>
