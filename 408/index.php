<?php include_once "../app/php/head.php"; ?>

<link rel="stylesheet" href="/app/css/error/error.css">

<main class="form-signin w-100 m-auto d-flex text-center flex-column justify-content-center">
    <div class="d-flex justify-content-center">
        <h1 class="display-4">408</h1>
    </div>
    <div class="d-flex justify-content-center">
        <p class="fs-4 mb-2">Время И Стекло.</p>
    </div>
    <div id="text" class="mb-4">
        Перенаправление через 3 сек.
    </div>
    <div class="d-flex justify-content-center">
        <a href="/" aria-label="Перейти на главную страницу" class="link">
            Перейти на главную
        </a>
    </div>
</main>

<script>
    setTimeout(function() {
        window.location.href = '/';
    }, 3000);
</script>

<?php include_once "../app/php/bottom/javascript.php"; ?>
