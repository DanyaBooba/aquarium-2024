<?php
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
?>

<?php include_once "../app/php/head.php"; ?>

<?php $error = @AddPostError($_GET["e"]) ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Добавить пост | Аквариум</title>

<style>
    .toolbar a {
        display: inline-block;
        border: 1px solid #888;
        padding: 5px 8px;
        margin: 0 5px 10px 0;
        color: #000;
        border-radius: 3px;
        font-size: 12px;
        box-shadow: 1px 1px 2px #ddd;
        background: #fff;
        vertical-align: top;
        text-decoration: none;
    }

    .toolbar input {
        display: inline-block;
        height: 28px;
        line-height: 28px;
        background: #fff;
        padding: 0;
        margin: 0 5px 10px 0;
        color: #000;
        box-shadow: 1px 1px 2px #ddd;
        border-radius: 3px;
        vertical-align: top;
        font-size: 12px;
    }

    .toolbar span {
        display: inline-block;
        height: 30px;
        line-height: 30px;
        padding: 0;
        margin: 0 0 10px 0;
        color: #000;
        vertical-align: top;
        font-size: 12px;
    }

    .editor {
        min-height: 150px;
        border: 1px solid var(--text-color-4);
        padding: 10px;
        border-radius: 6px;
        background: var(--bg-light);
    }

    .editor[placeholder]:empty:before {
        content: attr(placeholder);
        color: #555;
    }

    .editor[placeholder]:empty:focus:before {
        content: '';
    }
</style>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
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
                                        <button class="btn" id="toolbar-bold" title="Жирный">
                                            B
                                        </button>
                                        <button class="btn" id="toolbar-italic" title="Курсив">
                                            I
                                        </button>
                                        <button class="btn" id="toolbar-parag" title="Параграф">
                                            P
                                        </button>
                                        <button class="btn" id="toolbar-h" title="Параграф">
                                            H
                                        </button>
                                        <a href="#" class="toolbar-img far fa-image" title="Изображение">image</a>
                                        <a href="#" class="toolbar-a fas fa-link" title="Ссылка">link</a>
                                        <a href="#" class="toolbar-unlink fas fa-unlink" title="Удаление ссылки">unlink</a>
                                        <a href="#" class="toolbar-text" title="Вставить текст">Text</a>
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

        $('body').on('click', '.toolbar-img', function() {
            var url = prompt('Введите адрес изображения', 'https://snipp.ru/demo/526/image.jpg');
            document.execCommand('insertImage', false, url);
            return false;
        });

        $('body').on('click', '.toolbar-a', function() {
            var url = prompt('Введите URL', '');
            document.execCommand('CreateLink', false, url);
            return false;
        });

        $('body').on('click', '.toolbar-unlink', function() {
            document.execCommand('unlink', false, null);
            return false;
        });

        $('body').on('click', '.toolbar-text', function() {
            var text = prompt('Введите текст', '');
            document.execCommand('insertText', false, text);
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

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
