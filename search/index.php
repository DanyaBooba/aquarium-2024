<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/pages/main.css">

<title>Поиск | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/header.php"; ?>

    <main class="row row-cols-1 g-4">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-9 person-content">
            <h1>Поиск</h1>
            <div class="person-form">
                <form action="?" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" aria-label="Например, имя пользователя @dybka" placeholder="Например, имя пользователя @dybka">
                    </div>
                </form>
            </div>
            <div class="person-search-list list-group">
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">
                        <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                        Даниил Дыбка
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                        Даниил Дыбка
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                        Даниил Дыбка
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <img src="/app/img/users/icons/MAN1.jpg" alt="Даниил Дыбка">
                        Даниил Дыбка
                    </a>
                </ul>
            </div>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
