<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php
include_once "../api/auth-errors.php";
include_once "../app/php/head.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}
?>

<?php include_once "../app/php/head.php"; ?>

<title>Уведомления | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Уведомления</h1>
            <ul class="list-group list-group-flush person-content-notifications">
                <li class="list-group-item">
                    <h2>Спасибо за регистрацию</h2>
                    <div>
                        <p>
                            Мы благодарим Вас за то, что Вы выражаете поддержку соцсети Аквариум в столь трудную минуту.
                            Разработка соцсети занимает большое количество времени, и разработчики стараются выкладываться
                            на максимум, чтобы скорее преодолевать все трудности.
                        </p>
                        <p>
                            Регистрацией в соцсети на раннем этапе вы выражаете свою поддержку данному проекту, и даете
                            новые силы к достижению поставленных целей. Мы обещаем Вам, что всё Ваше внимание не будет
                            проигнорировано, специально для Вас мы подготовим специальные подарки, которые будут доступны
                            уже совсем скоро!
                        </p>
                    </div>
                </li>
                <li class="list-group-item">
                    <h2>Подарки для Вас</h2>
                    <div>
                        <p>
                            Специально для Вас были подготовлены следующие подарки: достижение "С первых минут" и
                            набор стикеров телеграм "Аквариум". Спасибо, что Вы с нами!
                        </p>
                        <p>
                            <a href="#" class="link">
                                Получить стикеры
                            </a>
                        </p>
                    </div>
                </li>
                <li class="list-group-item">
                    <h2>Бета-тест</h2>
                    <div>
                        <p>
                            Соцсеть Аквариум на данный момент находится на стадии разработки, и нам очень нужна поддержка от пользователей
                            в вопросе качества разрабатываемой платформы.
                        </p>
                        <p>
                            В том случае, если Вы обнаружили ошибку, пожалуйста, сообщите о ней в наш баг-репорт:
                            <a href="mailto:daniil@dybka.ru" class="link">daniil@dybka.ru</a>.
                            Мы обязательно учтем пожелания пользователей в вопросах качества платформы.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
