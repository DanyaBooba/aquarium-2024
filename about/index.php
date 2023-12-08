<?php
if (!isset($_SESSION)) session_start();
include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$all = count(@R::getAll(SqlRequestSelectAllAdmin()));
$allconfirm = count(@R::getAll(SqlRequestSelectAll()));
$allconfirmprocent = intval(($allconfirm / $all) * 100);
$procenttext = FormOfWord($all, "человек", "человека", "человек");
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>О проекте | Аквариум</title>

<script src="/app/js/wow.js"></script>
<!-- <script src="/app/js/countUp.js"></script> -->
<link rel="stylesheet" href="/app/css/animate.css" />

<script>
    new WOW().init()
</script>

<style>
    .main-icon {
        margin-bottom: 30px;
        margin-top: 100px
    }

    .logo-text {
        margin-bottom: 50px;
    }

    @media(max-width: 991px) {
        .main-icon {
            margin-bottom: 30px;
            margin-top: 50px
        }

        .logo-text {
            margin-bottom: 30px;
        }
    }
</style>

<link rel="stylesheet" href="/app/css/pages/about.css" />

<body class="container">
    <main class="col-md-8 mx-auto" style="margin-bottom: 50px" id="main">

        <svg class="svg-normal img-fluid main-icon" viewBox="0 0 1403 270" xmlns="http://www.w3.org/2000/svg">
            <path d="M1356.22 62.9C1387.42 62.9 1402.42 87.8 1402.42 121.1V215H1377.82V126.8C1377.82 98 1371.52 83.9 1347.22 83.9C1317.52 83.9 1299.82 110.3 1299.82 149.3V215H1275.22V126.8C1275.22 98 1268.92 83.9 1244.62 83.9C1214.92 83.9 1197.22 110.3 1197.22 149.3V215H1172.62V65.9H1197.22V91.4L1193.32 108.2H1200.22C1206.22 81.2 1221.82 62.9 1253.62 62.9C1280.62 62.9 1295.02 81.5 1298.32 108.2H1302.82C1308.82 81.2 1324.42 62.9 1356.22 62.9Z" />
            <path d="M1055.07 197C1086.57 197 1108.77 172.1 1108.77 132.2V65.9H1133.07V215H1108.77V189.2L1112.67 172.1H1105.77C1099.77 199.1 1080.87 218 1048.47 218C1014.57 218 992.67 198.5 992.67 157.1V65.9H1017.27V153.8C1017.27 185 1029.27 197 1055.07 197Z" />
            <path d="M907.341 42.2C895.041 42.2 885.741 33.2 885.741 21.2C885.741 9.8 895.041 0.5 907.341 0.5C919.341 0.5 928.941 9.8 928.941 21.2C928.941 33.2 919.341 42.2 907.341 42.2ZM857.541 215V194H899.541V84.2L868.641 86.9V65.9L903.141 62.9C917.241 61.7 922.641 69.5 922.641 80.9V194H964.641V215H857.541Z" />
            <path d="M731.119 215V83.6C731.119 69.5 737.719 62.6 751.819 63.2L834.619 65.9V86.9L755.719 84.2V215H731.119Z" />
            <path d="M548.166 173.6C548.166 149.9 562.266 133.7 597.066 130.1L656.466 124.4C654.966 97.1 640.266 83.6 614.466 83.6C592.866 83.6 572.766 93.2 572.766 121.4H548.766C548.766 90.5 572.166 62.9 614.466 62.9C656.166 62.9 681.066 90.5 681.066 130.4V194H702.966V215H676.566C665.166 215 658.866 208.7 658.866 197.6V189.5L662.766 173.9H655.566C649.866 196.7 633.966 218 597.966 218C554.766 218 548.166 189.2 548.166 173.6ZM572.766 170.6C572.766 187.7 583.566 197 600.966 197C634.866 197 656.466 173.6 656.466 142.7L601.266 148.4C582.366 150.2 572.766 155.9 572.766 170.6Z" />
            <path d="M433.683 197C465.183 197 487.383 172.1 487.383 132.2V65.9H511.683V215H487.383V189.2L491.283 172.1H484.383C478.383 199.1 459.483 218 427.083 218C393.183 218 371.283 198.5 371.283 157.1V65.9H395.883V153.8C395.883 185 407.883 197 433.683 197Z" />
            <path d="M331.58 65.9V269.6H306.98V193.1L311.18 176.3H303.98C297.68 199.4 277.88 218 243.98 218C200.48 218 172.58 184.7 172.58 140.6C172.58 96.2 200.48 62.9 243.98 62.9C277.88 62.9 297.68 81.5 303.98 104.9H311.18L306.98 87.8V65.9H331.58ZM306.98 140.6C306.98 100.7 281.78 83.9 250.88 83.9C219.98 83.9 197.18 101.3 197.18 140.6C197.18 179.6 219.98 197 250.88 197C281.78 197 306.98 180.2 306.98 140.6Z" />
            <path d="M0.900024 173.6C0.900024 149.9 15 133.7 49.8 130.1L109.2 124.4C107.7 97.1 93 83.6 67.2 83.6C45.6 83.6 25.5 93.2 25.5 121.4H1.50003C1.50003 90.5 24.9 62.9 67.2 62.9C108.9 62.9 133.8 90.5 133.8 130.4V194H155.7V215H129.3C117.9 215 111.6 208.7 111.6 197.6V189.5L115.5 173.9H108.3C102.6 196.7 86.7 218 50.7 218C7.50003 218 0.900024 189.2 0.900024 173.6ZM25.5 170.6C25.5 187.7 36.3 197 53.7 197C87.6 197 109.2 173.6 109.2 142.7L54 148.4C35.1 150.2 25.5 155.9 25.5 170.6Z" />
        </svg>

        <h1 class="visually-hidden">Социальная сеть Аквариум</h1>

        <div class="text-center fs-3 logo-text">
            <p>
                Социальная сеть с открытым исходным кодом.
            </p>
        </div>

        <div class="row row-cols-1 row-cols-lg-2 g-2 fs-5" style="margin-bottom: 50px">
            <div class="col p-3">
                <p class="display-2">
                    😓
                </p>
                <p>
                    В 2019 году мы начали разработку социальной сети.
                    За 4 года мы столкнулись с разными трудностями в
                    разработке. У нас не получалось сделать качественный
                    продукт.
                </p>
            </div>
            <div class="col p-3">
                <p class="display-2">
                    🎉
                </p>
                <p>
                    В 2023 году мы провели успешный перезапуск проекта,
                    который привел к улучшению социальной сети и
                    созданию продукта, о котором хочется говорить.
                </p>
            </div>
            <div class="col p-3 wow fadeIn" data-wow-offset="300">
                <p class="display-2">
                    🥰
                </p>
                <p>
                    Уже сейчас на платформе зарегистрировано свыше 30 человек,
                    за нами следят и интересуются. Скорее становитесь
                    частью этого комьюнити на ранних этапах разработки.
                </p>
            </div>
            <div class="col p-2 wow fadeIn" data-wow-offset="300" style="background-color: var(--bg-light); border-radius: 8px;">
                <div class="p-4">
                    <p>
                        <a href="//aquariumsocial.t.me">
                            <img src="/app/img/content/social-logos/telegram.jpg" width="62" class="rounded-circle" alt="Телеграм">
                        </a>
                    </p>
                    <p>
                        Мы ведём телеграм канал, в котором рассказываем о проекте,
                        делимся изменениями и проводим конкурсы с призами.
                    </p>
                    <p class="mb-0">
                        <a href="//aquariumsocial.t.me" class="link">
                            Читать
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 wow fadeInUp" data-wow-offset="300">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/app/img/content/about/aqua1.jpg" class="d-block img-fluid" alt="Bootstrap Themes" height="500">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 mb-3">
                        Что такое Аквариум?
                    </h2>
                    <p class="fs-5">
                        Это ваш виртуальный мир под водой: это не просто еще одна соцсеть, это место, где Вы сможете создать свой уникальный подводный мир, отражающий Вашу личность, интересы и стиль жизни.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 wow fadeInUp" data-wow-offset="300">
                <div class="col-lg-6">
                    <h2 class="display-5 mb-3">
                        Возможности
                    </h2>
                    <ul class="fs-5">
                        <li>
                            🐬 Уникальная тематика
                        </li>
                        <li>
                            🌊 Погружение в красоту мира
                        </li>
                        <li>
                            🎨 Кастомизация профиля
                        </li>
                        <li>
                            💌 Общение с друзьями
                        </li>
                        <li>
                            📸 Публикация фотографий и постов
                        </li>
                    </ul>
                </div>
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/app/img/content/about/aqua2.jpg" class="d-block img-fluid" alt="Bootstrap Themes" height="500">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 wow fadeInUp" data-wow-offset="300">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="/app/img/content/about/aqua3.jpg" class="d-block img-fluid" alt="Bootstrap Themes" height="500">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 mb-3">
                        Для кого Аквариум?
                    </h2>
                    <ul class="fs-5">
                        <li>
                            Любители подводного мира и фотографии
                        </li>
                        <li>
                            Путешественники и любители морских приключений
                        </li>
                        <li>
                            Фотографы и художники
                        </li>
                        <li>
                            Общественные личности
                        </li>
                        <li>
                            Любознательные наблюдатели и обычные люди
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <h3 class="text-center h1 mb-3">Аквариум в цифрах</h3>

        <div class="row row-cols-1 row-cols-lg-2 g-2 fs-5" style="margin-bottom: 100px">
            <div class="col p-3">
                <p>
                    На нашей платформе зарегистрировано <span class="text-success fs-4" id="anim1"><?php echo $all ?></span> <?php echo $procenttext ?>,
                    из которых <span class="text-success fs-4"><?php echo $allconfirmprocent ?>%</span> имеют подтвержденные аккаунты.
                </p>
                <p class="text-more mb-0">
                    Обновляется в режиме реального времени.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    На страницы платформы с момента запуска
                    пользователи заходили свыше <span class="text-success fs-4" id="anim2">5000</span> раз.
                </p>
                <p class="text-more mb-0">
                    На основе данных из Яндекс Метрики.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    За 23 дня мы провели <span class="text-success fs-4" id="anim3">20</span> изменений,
                    из которых <span class="text-success fs-4">5</span> оказались масштабными,
                    сильно повлиявшими на проект.
                </p>
                <p class="text-more mb-0">
                    На основе данных из <a href="//aquariumsocial.t.me" class="link">Телеграм канала</a>.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    Почти каждый день происходит регистрация
                    <span class="text-success fs-4">новых</span> пользователей, хотя платформа находится
                    только в бета-тестировании.
                </p>
            </div>
        </div>

        <h3 class="text-center h1 mb-3">Планы на ближайшее будущее</h3>

        <div class="row row-cols-1 row-cols-lg-2 g-2 fs-5" style="margin-bottom: 100px">
            <div class="col p-3">
                <p>
                    Добавление <span class="text-success">фотографий</span> для аватарок пользователей, шапок и постов.
                    Возможность масштабировать изображение в круге, загрузка нескольких
                    фотографий для постов.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    Разработка <span class="text-success">мобильного приложения</span> для Android, iOS, iPadOS с
                    возможностью авторизации в аккаунт, поддержки полного функционала
                    веб-версии приложения.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    Разработка <span class="text-success">настольного приложения</span> для платформы Windows, macOS,
                    Linux с полным функционалом веб-версии.
                </p>
            </div>
            <div class="col p-3">
                <p>
                    Разработка <span class="text-success">OAuth</span> протокола для авторизации с помощью сервиса Аквариум.
                </p>
            </div>
        </div>

        <h3 class="text-center h1 mb-3">Мнение пользователей</h3>

        <div style="margin-bottom: 30px">
            <div class="see-at-mobile mb-2 fs-5 d-flex align-items-center justify-content-center">
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                8/10
            </div>
            <div class="d-flex align-items-center see-at-pc mb-2">
                <span class="me-3 fs-5">
                    8/10
                </span>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
            </div>
            <div class="p-4 mb-3" style="background-color: var(--bg-light); border-radius: 8px;">
                <p class="fs-4 mb-0">
                    «Аквариум — это прекрасная платформа
                    для взаимодействия людей... Именно так мне
                    презентовали друзья этот сайт. И знаете?
                    Мне действительно нравится, хоть проект
                    ещё нужно развивать...»
                </p>
            </div>
            <p class="text-more mb-0">
                Александр, 17 лет.
            </p>
        </div>

        <div style="margin-bottom: 30px">
            <div class="see-at-mobile mb-2 fs-5 d-flex align-items-center justify-content-center">
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                8/10
            </div>
            <div class="d-flex align-items-center see-at-pc mb-2">
                <span class="me-3 fs-5">
                    8/10
                </span>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
            </div>
            <div class="p-4 mb-3" style="background-color: var(--bg-light); border-radius: 8px;">
                <p class="fs-4 mb-0">
                    «...»
                </p>
            </div>
            <p class="text-more mb-0">
                Илья, 19 лет.
            </p>
        </div>

        <div style="margin-bottom: 30px">
            <div class="see-at-mobile mb-2 fs-5 d-flex align-items-center justify-content-center">
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                7/10
            </div>
            <div class="d-flex align-items-center see-at-pc mb-2">
                <span class="me-3 fs-5">
                    7/10
                </span>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg fill="#f1c40f" width="20" height="20" class="me-1">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star-fill"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
                <svg width="20" height="20" class="me-1 svg-normal-2">
                    <use xlink:href="/app/img/icons/bootstrap.svg#star"></use>
                </svg>
            </div>
            <div class="p-4 mb-3" style="background-color: var(--bg-light); border-radius: 8px;">
                <p class="fs-4 mb-0">
                    «Чуть немного тяжеловатый интерфейс, я уже привыкла к другим соцсетям.
                    Ещё мне нравится название, как будто рыбки в аквариуме...»
                </p>
            </div>
            <p class="text-more mb-0">
                Анастасия, 18 лет.
            </p>
        </div>

    </main>

    <!-- <script>
        window.addEventListener('DOMContentLoaded', () => {
            let max1 = document.getElementById("anim1").textContent;
            let max2 = document.getElementById("anim2").textContent;
            let max3 = document.getElementById("anim3").textContent;

            new CountUp('anim1', 0, max1, 0, 2).start();
            new CountUp('anim2', 0, max2, 0, 2).start();
            new CountUp('anim3', 0, max3, 0, 2).start();
        })
    </script> -->

    <?php include_once "../app/php/bottom/footer-content.php"; ?>

    <?php include_once "../app/php/bottom/javascript.php"; ?>
</body>

</html>
