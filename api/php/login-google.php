<?php

require "../token.php";
require "../../vendor/autoload.php";

$parameters = [
    'client_id'     => GOOGLE_CLIENT_ID,
    'client_secret' => GOOGLE_CLIENT_SECRET,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'grant_type'    => 'authorization_code',
    'code'          => $_GET['code'],
];

$client = new \GuzzleHttp\Client();

$response = $client->post(GOOGLE_TOKEN_URI, ['form_params' => $parameters]);

// var_dump($response);

// $data = json_decode($response->getBody()->getContents(), true);

// var_dump($data);
