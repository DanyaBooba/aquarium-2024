<?php

function EmailRestorePassword($email, $url)
{
    $text = "Ссылка для восстановления пароля в Аквариум:<br><br>
    <a href='$url'>$url</a><br><br>
    Не давайте ссылку никому, даже если её требуют от имени Аквариума!<br><br>
    Эта ссылка используется для восстановления пароля Вашего аккаунта в Аквариум.<br><br>
    Если Вы не запрашивали ссылку для восстановления доступа, проигнорируйте это сообщение.";

    Email($email, "Восстановление пароля", $text);
}

function EmailConfirmEmail($email, $url)
{
    $text = "Ссылка для подтверждения почты в Аквариум:<br><br>
    <a href='$url'>$url</a><br><br>
    Не давайте ссылку никому, даже если её требуют от имени Аквариума!<br><br>
    Эта ссылка используется для подтверждения почты Вашего аккаунта в Аквариум.<br><br>
    Если Вы не запрашивали ссылку для восстановления доступа, проигнорируйте это сообщение.";

    Email($email, "Подтверждение аккаунта", $text);
}

function Email($email, $subject = "", $text)
{
    $subject .= " | Соцсеть Аквариум";
    $headers = "From: info@creagoo.ru\r\nContent-type: text/html";

    echo "Email: $email<br>";
    echo "Subject: $subject<br>";
    echo "Text: $text<br>";
    echo "Headers: $headers<br>";

    // mail($email, $subject, $message, $headers);
}
