<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "app/php/content/head.php"; ?>

<title>Начальная страница</title>

<body class="container">
    <?php include_once "app/php/content/header.php"; ?>

    <main>
        <div class="row align-items-center">
            <div class="col-md-8 d-flex justify-content-center">
                <div class="p-3 d-flex">
                    <a href="#" aria-label="Скачать для Android" style="margin-right: -30px">
                        <img src="/app/img/content/mainpage/android.png" class="img-fluid" width="200">
                    </a>
                    <a href="#" aria-label="Скачать для iOS">
                        <img src="/app/img/content/mainpage/iphone.png" class="img-fluid" width="220">
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-light d-flex flex-column">
                    <img src="/app/img/logo/aquarium.svg" alt="Логотип Аквариума">
                    <h3 class="text-center">Вход</h3>
                    <form action="">
                        <input class="form-control" type="email" name="email" placeholder="Почта" aria-label="Почта">
                        <input class="form-control" type="password" name="password" placeholder="Пароль" aria-label="Пароль">
                        <button class="btn btn-success" type="submit">
                            Войти
                            <svg>
                                <use xlink:href="/app/img/icons/bootstrap.svg#arrow-right"></use>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "app/php/content/footer.php"; ?>
</body>

</html>
