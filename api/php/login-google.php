<?php

require "../token.php";

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

        var_dump($info);
    }
}
