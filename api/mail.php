<?php

function EmailRestorePassword($email, $url)
{
    $text = "Ссылка для восстановления пароля в соцсети Аквариум:<br><br>
    <a href='$url'>$url</a><br><br>
    Не давайте эту ссылку никому, даже если её требуют от имени Аквариума!<br><br>
    Эта ссылка используется для восстановления пароля аккаунта в соцсети Аквариум.<br><br>
    Если Вы не запрашивали ссылку для восстановления пароля, проигнорируйте это сообщение.";

    Email($email, "Восстановление пароля", $text);
}

function EmailConfirmEmail($email, $url)
{
    $text = "Спасибо за регистрацию в социальной сети Аквариум.<br><br>
    Для того, чтобы Ваш аккаунт видели другие пользователи и Вы могли с ними взаимодействовать, подтвердите Вашу почту.<br><br>
    Ссылка для подтверждения почты в Аквариум:<br><br>
    <a href='$url'>$url</a><br><br>
    Не давайте эту ссылку никому, даже если её требуют от имени Аквариума!<br><br>
    Эта ссылка используется для подтверждения Вашего аккаунта в соцсети Аквариум.<br><br>
    Если Вы не запрашивали ссылку для подтверждения аккаунта, проигнорируйте это сообщение.";

    Email($email, "Подтверждение аккаунта", $text);
}

function EmailLoginByCode($email, $code)
{
    $text = "Код для входа в Аквариум: <b>$code</b>.<br><br>
    Не давайте код никому, даже если его требуют от имени Аквариума!<br><br>
    Этот код используется для входа в аккаунт в соцсеть Аквариум.<br><br>
    Если Вы не запрашивали код для входа, проигнорируйте это сообщение.";

    Email($email, "Вход по коду", $text);
}

function EmailAfterLogin($email)
{
    date_default_timezone_set('UTC');
    $date = date("d/m/Y H:i:s");
    $heads = getallheaders()["User-Agent"];

    $text = "$date UTC зафиксирован вход в Ваш аккаунт соцсети Аквариум.<br><br>
    Если это были не Вы, смените пароль аккаунта:
    <a href='https://social.creagoo.ru/settings/#password'>https://social.creagoo.ru/settings</a><br><br>
    Сведения: $heads.<br><br>
    ";

    Email($email, "Вход в аккаунт", $text);
}

function EmailUpdatePassword($email)
{
    date_default_timezone_set('UTC');
    $date = date("d/m/Y H:i:s");
    $heads = getallheaders()["User-Agent"];

    $text = "$date UTC изменен пароль Вашего аккаунта соцсети Аквариум.<br><br>
    Если это были не Вы, смените пароль аккаунта:
    <a href='https://social.creagoo.ru/settings/#password'>https://social.creagoo.ru/settings</a><br><br>
    Сведения: $heads.<br><br>
    ";

    Email($email, "Изменение пароля", $text);
}

//
// Basic
//

function Email($email, $subject = "", $text)
{
    $subject .= " | Соцсеть Аквариум";
    $headers = "From: info@creagoo.ru\r\nContent-type: text/html";

    mail($email, $subject, $text, $headers);
}
