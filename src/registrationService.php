<?php

function register(array $userArray)
{
    $imagePath = saveImage($userArray['image']);
    $user = R::dispense('users');
    $user->surname  = htmlspecialchars(trim($userArray['surname']));
    $user->name     = htmlspecialchars(trim($userArray['name']));
    $user->email    = $userArray['email'];
    $user->password = password_hash($userArray['password'], PASSWORD_DEFAULT);
    $user->icon     = $imagePath;
    $user->joinTime = time();

    return R::store($user);
}

function saveImage($image)
{
    $imageName = basename($image['name']);
    if (!is_dir($_SERVER['DOCUMENT_ROOT'] . 'images/')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . 'images/');
    }
    $uploadfile = $_SERVER['DOCUMENT_ROOT'] . 'images/' . $imageName;
    if (move_uploaded_file($image['tmp_name'], $uploadfile)) {
        return $imageName;
    } else {
        return null;
    }
}