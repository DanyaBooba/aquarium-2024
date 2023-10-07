<footer>
    <div class="container footer">
        <div class="footer__left">
            <img src="/app/img/logo/short.svg" alt="Логотип Аквариума">
            <p>© Аквариум, 2020-2023</p>
        </div>
        <div class="footer__center">
            <a href="/about/" class="link mx-3">
                О Аквариуме
            </a>
            <a href="/about/faq/" class="link mx-3">
                Вопросы
            </a>
            <a href="/about/user/" class="link mx-3">
                Пользователю
            </a>
        </div>
        <div class="footer__right theme-toggle">
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio1" value="light" autocomplete="off">
            <label class="btn btn-secondary" for="radio1">Светлая</label>
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio2" value="auto" autocomplete="off" checked>
            <label class="btn btn-secondary" for="radio2">Авто</label>
            <input onClick="CheckValueThemeColor()" type="radio" class="btn-check" name="color-theme" id="radio3" value="dark" autocomplete="off">
            <label class="btn btn-secondary" for="radio3">Тёмная</label>
        </div>
    </div>
</footer>
