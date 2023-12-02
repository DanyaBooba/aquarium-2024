<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}

if ($find[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$nots = R::getAll(SqlRequestFindNotifications($find[0]["email"]));
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Уведомления | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content person-content-notifications-main">
            <h1>Уведомления</h1>
            <?php if (count($nots) > 0) : ?>
                <h2>Оповещения</h2>
                <ul class="list-group list-group-flush person-content-notifications">
                    <?php for ($i = 0; $i < count($nots); $i++) : ?>
                        <li class="list-group-item">
                            <div class="person-profile-content-buttons person-content-notifications-button">
                                <h5 class="me-auto"><?php echo $nots[$i]["name"] ?></h5>
                                <button class="btn btn-secondary col-md-1" type="button" onClick="RotateButton('info<?php echo $i ?>')" data-bs-toggle="collapse" data-bs-target="#collapseinfo<?php echo $i ?>" aria-expanded="false" aria-controls="collapseinfo<?php echo $i ?>">
                                    <svg fill="white" width="16" height="16" id="svgcollapseinfo<?php echo $i ?>" class="notifications-svg-rotate-bottom">
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-down"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="collapse person-content-notifications-block" id="collapseinfo<?php echo $i ?>">
                                <p>
                                    <?php echo $nots[$i]["descr"] ?>
                                </p>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            <?php endif; ?>
            <h2>Системные</h2>
            <ul class="list-group list-group-flush person-content-notifications">
                <li class="list-group-item">
                    <div class="person-profile-content-buttons person-content-notifications-button">
                        <h5 class="me-auto">Спасибо за регистрацию</h5>
                        <button class="btn btn-secondary col-md-1" type="button" onClick="RotateButton(1)" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            <svg fill="white" width="16" height="16" id="svgcollapse1" class="notifications-svg-rotate-bottom">
                                <use xlink:href=" /app/img/icons/bootstrap.min.svg#chevron-down"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="collapse person-content-notifications-block" id="collapse1">
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
                    <div class="person-profile-content-buttons person-content-notifications-button">
                        <h5 class="me-auto">Подарки для Вас</h5>
                        <button class="btn btn-secondary col-md-1" type="button" onClick="RotateButton(2)" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <svg fill="white" width="16" height="16" id="svgcollapse2" class="notifications-svg-rotate-bottom">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-down"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="collapse person-content-notifications-block" id="collapse2">
                        <p>
                            Специально для Вас были подготовлены следующие подарки: достижение «С первых минут» и
                            набор стикеров телеграм «Аквариум». Спасибо, что Вы с нами!
                        </p>
                        <p>
                            <a class="link-empty">
                                Получить стикеры
                            </a>
                        </p>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="person-profile-content-buttons person-content-notifications-button">
                        <h5 class="me-auto">Бета-тест</h5>
                        <button class="btn btn-secondary col-md-1" type="button" onClick="RotateButton(3)" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <svg fill="white" width="16" height="16" id="svgcollapse3" class="notifications-svg-rotate-bottom">
                                <use xlink:href="/app/img/icons/bootstrap.min.svg#chevron-down"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="collapse person-content-notifications-block" id="collapse3">
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

    <script src="/app/js/person-notifications.js"></script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
