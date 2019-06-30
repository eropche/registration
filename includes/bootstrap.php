<?php

require "libs/rb-mysql.php";
require "config/parameters.php";


R::setup(
    'mysql:host='.$db['host'].';dbname='.$db['dbname'],
    $db['user'],
    $db['password'] 
);


session_start();


// translate
$notLogged = isset($_SESSION["en"]) ? "You are not logged in" : "Вы не вошли в систему";
$logIn = isset($_SESSION["en"]) ? "Log in" : "Войти";
$reg = isset($_SESSION["en"]) ? "Sign up" : "Зарегистрироваться";
$passwordLabel = isset($_SESSION["en"]) ? "Password" : "Пароль";
$repeatPasswordLabel = isset($_SESSION["en"]) ? "Confirm password" : "Повторите пароль";
$surnameLabel = isset($_SESSION["en"]) ? "Your last name" : "Ваша фамилия";
$nameLabel = isset($_SESSION["en"]) ? "Your name" : "Ваше имя";
$emailLabel = isset($_SESSION["en"]) ? "Your Email" : "Ваш Email";
$imageLabel = isset($_SESSION["en"]) ? "Your avatar" : "Ваш аватар";

$profile = isset($_SESSION["en"]) ? "Profile" : "Личный кабинет";

$name = isset($_SESSION["en"]) ? "Name" : "Имя";
$surname = isset($_SESSION["en"]) ? "Last name" : "Фамилия";
$email = isset($_SESSION["en"]) ? "Email" : "Электронная почта";
$image = isset($_SESSION["en"]) ? "Avatar" : "Аватар";

$logout = isset($_SESSION["en"]) ? "Log out" : "Выйти";

$lang = isset($_SESSION["en"]) ? "Change language" : "Сменить язык";