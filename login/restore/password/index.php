<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php

include_once "../../../api/rb-mysql.php";
include_once "../../../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$code = $_GET["c"];

$find = R::getAll("SELECT * FROM `reset` WHERE url like '$code'");

if (count($find) <= 0) {
    header("Location: /login/restore/?e=error_url");
    die();
}

if (abs(time() - $find[0]["timecreate"]) > 1800) {
    header("Location: /login/restore/?e=time_url");
    die();
}

$email = $find[0]["email"];

?>



<?php include_once "../../../api/auth-errors.php"; ?>

<?php include_once "../../../app/php/head.php"; ?>

<?php $error = RestoreError($_GET["e"]) ?>

<link rel="stylesheet" href="/app/css/auth/login.css" />

<title>Восстановить пароль | Аквариум</title>

<body>
    <main class="form-signin w-100 m-auto">
        <div class="auth-login">
            <div class="d-flex justify-content-center">
                <a href="/" class="auth-login--logo-link">
                    <svg class="svg-normal auth-login--logo" viewBox="0 0 1403 270" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1356.22 62.9C1387.42 62.9 1402.42 87.8 1402.42 121.1V215H1377.82V126.8C1377.82 98 1371.52 83.9 1347.22 83.9C1317.52 83.9 1299.82 110.3 1299.82 149.3V215H1275.22V126.8C1275.22 98 1268.92 83.9 1244.62 83.9C1214.92 83.9 1197.22 110.3 1197.22 149.3V215H1172.62V65.9H1197.22V91.4L1193.32 108.2H1200.22C1206.22 81.2 1221.82 62.9 1253.62 62.9C1280.62 62.9 1295.02 81.5 1298.32 108.2H1302.82C1308.82 81.2 1324.42 62.9 1356.22 62.9Z" />
                        <path d="M1055.07 197C1086.57 197 1108.77 172.1 1108.77 132.2V65.9H1133.07V215H1108.77V189.2L1112.67 172.1H1105.77C1099.77 199.1 1080.87 218 1048.47 218C1014.57 218 992.67 198.5 992.67 157.1V65.9H1017.27V153.8C1017.27 185 1029.27 197 1055.07 197Z" />
                        <path d="M907.341 42.2C895.041 42.2 885.741 33.2 885.741 21.2C885.741 9.8 895.041 0.5 907.341 0.5C919.341 0.5 928.941 9.8 928.941 21.2C928.941 33.2 919.341 42.2 907.341 42.2ZM857.541 215V194H899.541V84.2L868.641 86.9V65.9L903.141 62.9C917.241 61.7 922.641 69.5 922.641 80.9V194H964.641V215H857.541Z" />
                        <path d="M731.119 215V83.6C731.119 69.5 737.719 62.6 751.819 63.2L834.619 65.9V86.9L755.719 84.2V215H731.119Z" />
                        <path d="M548.166 173.6C548.166 149.9 562.266 133.7 597.066 130.1L656.466 124.4C654.966 97.1 640.266 83.6 614.466 83.6C592.866 83.6 572.766 93.2 572.766 121.4H548.766C548.766 90.5 572.166 62.9 614.466 62.9C656.166 62.9 681.066 90.5 681.066 130.4V194H702.966V215H676.566C665.166 215 658.866 208.7 658.866 197.6V189.5L662.766 173.9H655.566C649.866 196.7 633.966 218 597.966 218C554.766 218 548.166 189.2 548.166 173.6ZM572.766 170.6C572.766 187.7 583.566 197 600.966 197C634.866 197 656.466 173.6 656.466 142.7L601.266 148.4C582.366 150.2 572.766 155.9 572.766 170.6Z" />
                        <path d="M433.683 197C465.183 197 487.383 172.1 487.383 132.2V65.9H511.683V215H487.383V189.2L491.283 172.1H484.383C478.383 199.1 459.483 218 427.083 218C393.183 218 371.283 198.5 371.283 157.1V65.9H395.883V153.8C395.883 185 407.883 197 433.683 197Z" />
                        <path d="M331.58 65.9V269.6H306.98V193.1L311.18 176.3H303.98C297.68 199.4 277.88 218 243.98 218C200.48 218 172.58 184.7 172.58 140.6C172.58 96.2 200.48 62.9 243.98 62.9C277.88 62.9 297.68 81.5 303.98 104.9H311.18L306.98 87.8V65.9H331.58ZM306.98 140.6C306.98 100.7 281.78 83.9 250.88 83.9C219.98 83.9 197.18 101.3 197.18 140.6C197.18 179.6 219.98 197 250.88 197C281.78 197 306.98 180.2 306.98 140.6Z" />
                        <path d="M0.900024 173.6C0.900024 149.9 15 133.7 49.8 130.1L109.2 124.4C107.7 97.1 93 83.6 67.2 83.6C45.6 83.6 25.5 93.2 25.5 121.4H1.50003C1.50003 90.5 24.9 62.9 67.2 62.9C108.9 62.9 133.8 90.5 133.8 130.4V194H155.7V215H129.3C117.9 215 111.6 208.7 111.6 197.6V189.5L115.5 173.9H108.3C102.6 196.7 86.7 218 50.7 218C7.50003 218 0.900024 189.2 0.900024 173.6ZM25.5 170.6C25.5 187.7 36.3 197 53.7 197C87.6 197 109.2 173.6 109.2 142.7L54 148.4C35.1 150.2 25.5 155.9 25.5 170.6Z" />
                    </svg>
                </a>
            </div>
            <h1 class="h4">Восстановление пароля</h1>
            <?php if (empty($error) == false) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
            <?php endif; ?>
            <p>
                Почта: <b><?php echo $email; ?></b>
            </p>
            <form class="needs-validation" action="/api/php/restore-password.php" method="post" novalidate>
                <div>
                    <input class="form-control" type="password" name="password" placeholder="Пароль" aria-label="Пароль" required>
                    <div class="invalid-feedback">
                        Пожалуйста, введите пароль.
                    </div>
                    <p class="form-more">
                        Введите новый пароль
                    </p>
                </div>
                <div>
                    <input class="form-control" type="password" name="confirm_password" placeholder="Подтвердите пароль" aria-label="Подтвердите пароль" required>
                    <div class="invalid-feedback">
                        Пожалуйста, подтвердите введеный пароль.
                    </div>
                    <p class="form-more">
                        Повторите введенный вами пароль.
                    </p>
                </div>
                <button class="w-100 btn btn-primary" type="submit">
                    Восстановить
                </button>
            </form>
        </div>
        <div class="auth-login-bottom">
            <ul>
                <li>
                    Техническая поддержка:
                    <a href="mailto:daniil@dybka.ru" class="link">
                        daniil@dybka.ru
                    </a>
                </li>
                <li>
                    Подтверждаете
                    <a href="/about/user/privacypolicy/" class="link">
                        политику конфиденциальности
                    </a>
                </li>
            </ul>
        </div>
    </main>

    <script src="/app/js/confirm-form.js"></script>

    <?php include_once "../../../app/php/bottom/javascript.php"; ?>
</body>

</html>
