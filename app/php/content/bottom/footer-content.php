<footer>
    <div class="container footer">
        <div class="footer__left me-auto">
            <img src="/app/img/logo/short.svg" alt="Логотип Аквариума">
            <p>© Аквариум, 2020-2023</p>
        </div>
        <div class="d-flex justify-content-between align-items-center theme-toggle">
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio1" value="light" autocomplete="off">
            <label class="btn btn-secondary" for="radio1">Светлая</label>
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio2" value="auto" autocomplete="off" checked>
            <label class="btn btn-secondary" for="radio2">Авто</label>
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio3" value="dark" autocomplete="off">
            <label class="btn btn-secondary" for="radio3">Тёмная</label>
        </div>
    </div>
</footer>
