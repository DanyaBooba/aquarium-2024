<?php

if (!isset($_SESSION)) session_start();

include_once "../basic-methods.php";
include_once "../rb-mysql.php";
include_once "../token.php";
include_once "../mail.php";

R::setup('mysql:host=' . Token()["host"] . ';dbname=' . Token()["database"], Token()["username"], Token()["password"]);

$sessaccsql = SqlRequestFind($_SESSION["login"]);

$sessacc = R::getAll($sessaccsql);

if (count($sessacc) > 0) {
    header("Location: /person/");
    return;
}

if (!empty($_GET['code'])) {

    $params = array(
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code'],
        'client_id'     => TokenYandex()["client_id"],
        'client_secret' => TokenYandex()["client_secret"],
    );

    $ch = curl_init('https://oauth.yandex.ru/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);

    if (!empty($data['access_token'])) {
        $ch = curl_init('https://login.yandex.ru/info');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['format' => 'json']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: OAuth ' . $data['access_token']]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $info = curl_exec($ch);
        curl_close($ch);

        $info = json_decode($info, true);

        ##
        ## Registration
        ##

        // var_dump($info);

        $check = SqlRequestFind($info["default_email"]);

        $checkrow = R::getAll($check);

        if (count($checkrow) > 0) {
            $_SESSION["login"] = $info["default_email"];

            header("Location: /person/");
            return;
        }

        ##
        ## Reg user
        ##

        $maxid = R::getAll("SELECT MAX(`id`) FROM `users` LIMIT 1")[0]["MAX(`id`)"];
        $maxid += 1;

        $password = RandomString(20);

        $user = [
            "id" => $maxid,
            "email" => $info["default_email"],
            "password" => $password,
            "nickname" => ClearNickname($info["login"]),
            "firstName" => ClearName($info["first_name"]),
            "lastName" => ClearName($info["last_name"]),
        ];

        $tryfindnicknamesql = SqlRequestFindByNickname($user["nickname"]);

        $tryfindnickname = R::getAll($tryfindnicknamesql);

        if (count($tryfindnickname) > 0) {
            $user["nickname"] = "user" . $maxid . time();
        }

        $sql = SqlRequestCreateYandex($user);

        R::getAll($sql);

        // var_dump($sql);

        ##
        ## Send mail
        ##

        EmailRegYandex($info["default_email"], $password);

        $_SESSION["login"] = $info["default_email"];

        header("Location: /person/");

        return;
    }

    header("Location: /registration/");

    return;
}

header("Location: /registration");

return;

# ["sex"]=> NULL
# ["default_avatar_id"]=> string(35) "68143/Fn4eKYUcBOhIZG2n5j5wCLABylI-1" ["is_avatar_empty"]=> bool(false)
