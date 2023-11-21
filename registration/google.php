<?php

include_once "../api/token.php";

$parameters = [
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'client_id'     => GOOGLE_CLIENT_ID,
    'scope'         => implode(' ', GOOGLE_SCOPES),
];

$uri = GOOGLE_AUTH_URI . '?' . http_build_query($parameters);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <a href="<?php echo $uri ?>">OAuth 2.0 auth через Google</a>
</body>

</html>
