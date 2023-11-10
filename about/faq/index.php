<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->

<?php include_once "../../app/php/head.php"; ?>

<title>Ответы на вопросы | Аквариум</title>

<body class="container">
    <?php include_once "../../app/php/header.php"; ?>

    <main>
        <h1>Ответы на вопросы</h1>
        <hr>
        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        Открытая регистрация
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Регистрация в соцсети «Аквариум» бесплатная и без ограничений. Для регистрации вам следует
                        использовать почту, ввести никнейм и пароль к вашему аккаунту.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        Данные для регистрации
                    </button>
                </h2>
                <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Для регистрации в соцсети требуется от пользователя требуется только почта.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Активация профиля
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Для активации профиля вам следует открыть письмо на почте, и пройти по указанной ссылке.
                        Ссылка доступна в течении нескольких часов, по истечению времени вы сможете повторно запросить
                        активацию профиля.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Доступ к аккаунту
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        После регистрации и активации профиля у вас появится возможность входить в ваш аккаунт без
                        ограничений на любом устройстве.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        Доступность платформы
                    </button>
                </h2>
                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Платформа социальной сети «Аквариум» оснащена доступностью для лиц с
                        ограниченными возможностями здоровья. Настроено использование платформы
                        с клавиатуры, используются правильные теги, у изображений настроен
                        alt атрибут.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        API платформы
                    </button>
                </h2>
                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        Для использования на сторонних сервисах у вас есть возможность использовать
                        API для интеграции входа с помощью соцсети «Аквариум».
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        Автор «Аквариума»
                    </button>
                </h2>
                <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        ...
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        Техническая поддержка
                    </button>
                </h2>
                <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once "../../app/php/footer.php"; ?>
</body>

</html>
