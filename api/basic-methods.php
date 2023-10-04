<?php

function CheckDataUser($user)
{
    return count($user["email"]) < 3 || count($user["password"]);
}
