<?php
if (!isset($_SESSION)) session_start();
include_once "../api/auth-errors.php";

include_once "../api/rb-mysql.php";
include_once "../api/basic-methods.php";
include_once "../api/token.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

##
## Me
##

$find = @R::getAll(SqlRequestFind($_SESSION["login"]));

if (count($find) <= 0) {
    header("Location: /");
    die();
}

if ($find[0]["isblock"] == 1) {
    header("Location: /block/");
    die();
}

$allachivs = R::getAll("SELECT * FROM `achivs`");

##
## Server
##

$achivs = array_unique(json_decode($find[0]["achivs"]));
?>

<?php include_once "../app/php/head.php"; ?>

<!-- PHP. Author: Daniil Dybka, daniil@dybka.ru -->
<title>Достижения | Аквариум</title>

<body class="container">
    <?php include_once "../app/php/person/header.php"; ?>

    <main class="row row-cols-1 g-2">
        <?php include_once "../app/php/person/left-bar.php"; ?>
        <div class="col-md-10 person-content">
            <h1>Достижения</h1>
            <?php if (count($achivs) > 0) : ?>
                <ul class="list-group list-group-flush person-content-achivs">
                    <?php foreach ($achivs as $achivid) : ?>
                        <?php
                        $achiv = $allachivs[--$achivid];
                        $img = imageCreateFromJpeg("../app/img/achivs/" . $achiv["nameimg"] . ".jpg");

                        $width = ImageSX($img);
                        $height = ImageSY($img);

                        $thumb = imagecreatetruecolor(1, 1);
                        imagecopyresampled($thumb, $img, 0, 0, 0, 0, 1, 1, $width, $height);
                        $color = '#' . dechex(imagecolorat($thumb, 0, 0));

                        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
                        ?>
                        <li class="list-group-item">
                            <img src="/app/img/achivs/<?php echo $achiv["nameimg"] ?>.jpg" alt="<?php echo $achiv["name"] ?>" style="box-shadow: 0 .5rem 1rem rgba(<?php echo $r . ", " . $g . ", " . $b ?>, .3);">
                            <span class="d-flex flex-column">
                                <p class="person-content-achivs-name h2">
                                    «<?php echo $achiv["name"] ?>»
                                </p>
                                <p>
                                    <?php echo $achiv["descr"] ?>
                                </p>
                            </span>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php else : ?>
                <p class="text-center">Нет достижений.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include_once "../app/php/footer.php"; ?>
</body>

</html>
