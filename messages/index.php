<?php


// header("Location: /");


if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$user = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($user) <= 0) {
    header("Location: /");
    die();
}

if ($user[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$user = $user[0];
$logo = ($user["ismale"] == 1 ? "MAN" : "WOMAN") . $user["logoid"] . ".png";
$bg = "BG" . $user["capid"] . ".png";

$countsubme = count(array_unique(json_decode($user["isubs"])));
$countsubatme = count(array_unique(json_decode($user["atmesubs"])));

$countachivs = count(array_unique(json_decode($user["achivs"])));
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Личный кабинет | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Сообщения</h1>
            <div class="row row-cols-1 person-messages g-2">
                <div class="col-md-4">
                    <div class="person-messages-bg">
                        <ul class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action list-active">
                                <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                                <span>
                                    Даниил Дыбка
                                </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="person-messages-bg">
                        <div class="person-messages-header">
                            <div class="person-messages-header-user">
                                <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                                <span class="header-user-name">
                                    Даниил Дыбка
                                </span>
                                <span>
                                    <a href="#">
                                        <svg>
                                            <use xlink:href="/app/img/icons/bootstrap.min.svg#search"></use>
                                        </svg>
                                    </a>
                                </span>
                                <span>
                                    <a href="#">
                                        <svg>
                                            <use xlink:href="/app/img/icons/bootstrap.min.svg#three-dots"></use>
                                        </svg>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="person-messages-content" id="person-messages">
                            <?php if (true == 1) : ?>
                                <div class="message-me">
                                    <span class="message">
                                        <span class="message-text">
                                            Более длинный текст, тестовая запись
                                            и так далее, да?
                                        </span>
                                        <span class="message-time">
                                            11:02
                                        </span>
                                    </span>
                                </div>
                                <div class="message-he">
                                    <span class="message">
                                        <span class="message-text">
                                            Более длинный текст, тестовая запись
                                            и так далее, да?
                                        </span>
                                        <span class="message-time">
                                            11:02
                                        </span>
                                    </span>
                                </div>
                                <div class="message-he">
                                    <span class="message">
                                        <span class="message-text">
                                            Более длинный текст, тестовая запись
                                            и так далее, да?
                                        </span>
                                        <span class="message-time">
                                            11:02
                                        </span>
                                    </span>
                                </div>
                                <div class="message-he">
                                    <span class="message">
                                        <span class="message-text">
                                            Более длинный текст, тестовая запись
                                            и так далее, да?
                                        </span>
                                        <span class="message-time">
                                            11:02
                                        </span>
                                    </span>
                                </div>
                                <div class="message-he">
                                    <span class="message">
                                        <span class="message-text">
                                            Более длинный текст, тестовая запись
                                            и так далее, да?
                                        </span>
                                        <span class="message-time">
                                            11:02
                                        </span>
                                    </span>
                                </div>
                            <?php else : ?>
                                <div class="message-empty">
                                    <p class="h4">
                                        У вас нет сообщений
                                    </p>
                                    <p>
                                        Напишите человеку первым.
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="person-messages-input">
                            <form action="?" method="post">
                                <input type="text" placeholder="Сообщение" name="message" class="form-control" aria-label="Сообщение">
                                <button type="submit" class="btn btn-primary">
                                    <svg>
                                        <use xlink:href="/app/img/icons/bootstrap.min.svg#send"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        let element = document.getElementById("person-messages");
        element.scrollTop = element.scrollHeight;
    </script>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
