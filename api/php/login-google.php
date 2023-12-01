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

    $params = [
        'client_id'     => TokenGoogle()["client_id"],
        'client_secret' => TokenGoogle()["client_secret"],
        'redirect_uri'  => TokenGoogle()["redirect_uri"],
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code']
    ];

    $ch = curl_init('https://accounts.google.com/o/oauth2/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($data, true);
    if (!empty($data['access_token'])) {

        $params = [
            'access_token' => $data['access_token'],
            'id_token'     => $data['id_token'],
            'token_type'   => 'Bearer',
            'expires_in'   => 3599
        ];

        $info = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?' . urldecode(http_build_query($params)));
        $info = json_decode($info, true);

        ##
        ## Reg
        ##

        // var_dump($info);

        $check = SqlRequestFind($info["email"]);

        $checkrow = R::getAll($check);

        if (count($checkrow) > 0) {
            $_SESSION["login"] = $info["email"];

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
            "email" => $info["email"],
            "password" => $password,
            "nickname" => ClearNickname($info["name"]),
            "emailverify" => $info["verified_email"] ? 1 : 0
        ];

        $tryfindnicknamesql = SqlRequestFindByNickname($user["nickname"]);

        $tryfindnickname = R::getAll($tryfindnicknamesql);

        if (count($tryfindnickname) > 0) {
            $user["nickname"] = "user" . $maxid . time();
        }

        $sql = SqlRequestCreateGoogle($user);

        R::getAll($sql);

        ##
        ## Send mail
        ##

        EmailRegGoogle($info["email"], $password);

        $_SESSION["login"] = $info["email"];

        header("Location: /person/");

        return;
    }

    header("Location: /registration/");

    return;
}

header("Location: /registration/");

return;

// ["picture"]=> string(93) "https://lh3.googleusercontent.com/a/ACg8ocIPPT2SIGa4pyi5zq9vbsDYaFSkoY2QmqgQDgWkRS-xYEo=s96-c"
