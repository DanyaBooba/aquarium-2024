<?php # PHP. Author: Daniil Dybka, daniil@dybka.ru
?>

<?php include_once "app/php/content/head.php"; ?>

<title>Начальная страница</title>

<body class="container">
    <?php include_once "app/php/content/header.php"; ?>

    <main>
        <div class="row row-cols-2" style="margin-bottom: 30px">
            <div class="col p-2">
                <div class="p-4 bg-light rounded-3">
                    <h1>🐠 Аквариум</h1>
                    <p class="mb-0 fs-5">
                        Социальная сеть для всех. Первый клиент, авторизация в аккаунт, поиск
                        друзей и общения здесь и сейчас!
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="p-4 bg-light rounded-3">
                    <h1>🤖 Защита данных</h1>
                    <p class="mb-0 fs-5">
                        Шифрование пароля, защищенные запросы и полная конфиденциальность
                        данных.
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="p-4 bg-light rounded-3">
                    <h1>👭 Поиск друзей</h1>
                    <p class="mb-0 fs-5">
                        Найдите себе людей по вкусу: подпишитесь на человека, следите
                        за его новостями.
                    </p>
                </div>
            </div>
            <div class="col p-2">
                <div class="p-4 bg-light rounded-3">
                    <h1>💫 Персонализация</h1>
                    <p class="mb-0 fs-5">
                        Ваша лента с новостями, без рекламы. Только полезные рекомендации.
                    </p>
                </div>
            </div>
        </div>
        <div>
            Example
        </div>
    </main>

    <?php include_once "app/php/content/footer.php"; ?>
</body>

</html>
