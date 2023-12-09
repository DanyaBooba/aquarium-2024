<?php
if (!isset($_SESSION)) session_start();
include_once "../../api/auth-errors.php";

include_once "../../api/rb-mysql.php";
include_once "../../api/basic-methods.php";
include_once "../../api/token.php";

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
?>

<?php include_once "../../app/php/head.php"; ?>

<?php $error = @AddPostError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Добавить пост | Аквариум</title>

<link rel="stylesheet" href="/app/css/pages/add-post.css">

<body class="container">
    <?php include_once "../../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Добавить пост</h1>
            <div class="container px-0">
                <div class="person-setting row row-cols-1 g-2">
                    <div class="person-rightbar-content">
                        <div class="person-setting-bg person-block-add-post">
                            <form class="needs-validation" action="/api/php/person/add-post.php" id="formPost" method="post" novalidate>
                                <?php if (empty($error) == false) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="toolbar">
                                        <button class="btn" id="toolbar-h" title="Параграф">
                                            <svg>
                                                <use xlink:href="/app/img/icons/bootstrap.svg#h-square"></use>
                                            </svg>
                                        </button>
                                        <button class="btn" id="toolbar-parag" title="Параграф">
                                            <svg>
                                                <use xlink:href="/app/img/icons/bootstrap.svg#fonts"></use>
                                            </svg>
                                        </button>
                                        <button class="btn" id="toolbar-bold" title="Жирный">
                                            <svg>
                                                <use xlink:href="/app/img/icons/bootstrap.svg#type-bold"></use>
                                            </svg>
                                        </button>
                                        <button class="btn" id="toolbar-italic" title="Курсив">
                                            <svg>
                                                <use xlink:href="/app/img/icons/bootstrap.svg#type-italic"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="editor" contenteditable="true" name="example123" placeholder="Введите текст"></div>
                                </div>
                                <textarea id="textarea" name="text" style="display: none;"></textarea>
                                <button class="btn btn-primary w-100" type="submit">
                                    Добавить пост
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="person-rightbar-empty"></div>
                </div>
            </div>
        </div>
    </main>

    <script src="/app/js/button.js"></script>
    <script src="/app/js/form-edit-url.js"></script>
    <script src="/app/js/confirm-form.js"></script>

    <script src="/app/js/jquery.js"></script>
    <script>
        $('body').on('click', '.toolbar #toolbar-bold', function() {
            document.execCommand('bold', false, null);
            return false;
        });

        $('body').on('click', '.toolbar #toolbar-italic', function() {
            document.execCommand('italic', false, null);
            return false;
        });

        $('body').on('click', '.toolbar #toolbar-h', function() {
            document.execCommand('formatBlock', false, 'h3');
            return false;
        });

        $('body').on('click', '.toolbar #toolbar-parag', function() {
            document.execCommand('formatBlock', false, 'p');
            return false;
        });

        $('body').on('focusout', '.editor', function() {
            var element = $(this);
            if (!element.text().replace(' ', '').length) {
                element.empty();
            }
        });

        function escapeText(text) {
            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };

            return text.replace(/[&<>"']/g, function(m) {
                return map[m];
            });
        }

        $('body').on('paste', '.editor', function(e) {
            e.preventDefault();
            var text = (e.originalEvent || e).clipboardData.getData('text/plain');
            document.execCommand('insertHtml', false, escapeText(text));
        });

        $('#formPost').on('submit', function() {
            $('#formPost #textarea').val($('.editor').html());
            return true;
        });
    </script>

    <?php include_once "../../app/php/footer.php"; ?>
</body>

</html>
