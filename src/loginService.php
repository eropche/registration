<?php

function login(string $email)
{
    $user = R::findOne("users", "email = ?", [$email]);
    $_SESSION["logged_user"] = $user;

    return true;
}