<?php

session_start();

$_SESSION["login"] = "";

header("Location: /");
