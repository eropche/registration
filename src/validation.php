<?php

function validateRegistrationForm(array $request, $maxSizeImage) 
{
    $errors = [];
    if (!isset($request['email']) || strlen($request['email']) == 0) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'Email not specified' : 'Email не указан';
    } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'Wrong email format' : 'Неправильный формат email';
    } elseif (strlen($request['email']) < 4) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'Email must be more than 4 characters' : 'Email должен быть больше 4х символов';
    } elseif (R::count('users', 'email = ?', [$request['email']]) > 0) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'Email already in use' : 'Email уже используется';
    }
    
    if (!isset($request['password']) || empty($request['password'])) {
        $errors[]['password'] = isset($_SESSION["en"]) ? 'Password not specified' : 'Пароль не указан';
    }
    if (!isset($request['password_repeat']) || empty($request['password_repeat'])) {
        $errors[]['password_repeat'] = isset($_SESSION["en"]) ? 'Need to repeat the password' : 'Нужно повторить пароль';
    } elseif ((isset($request['password']) && isset($request['password_repeat'])) && ($request['password'] != $request['password_repeat'])) {
        $errors[]['password_repeat'] = isset($_SESSION["en"]) ? 'Passwords do not match' : 'Пароли не совпадают';
    }

    if ($request['image']['size'] > $maxSizeImage) {
        $errors[]['image'] = isset($_SESSION["en"]) ? 'The loaded image is too large' : 'Загруженное изображение слишком большое';
    }

    return $errors;
}

function validateLoginForm(array $request) 
{
    $errors = [];
    if (!isset($request['email']) || strlen($request['email']) == 0) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'Email not specified' : 'Email не указан';
    }
    if (!isset($request['password']) || empty($request['password'])) {
        $errors[]['password'] = isset($_SESSION["en"]) ? 'Password not specified' : 'Пароль не указан';
    }

    $user = R::findOne("users", "email = ?", [$request["email"]]);
    if ($user === null) {
        $errors[]['email'] = isset($_SESSION["en"]) ? 'No such user is registered' : 'Пользователя с таким Email не зарегистрировано';
    } else {
        if (!password_verify($request["password"], $user->password)) {
            $errors[]['password'] = isset($_SESSION["en"]) ? 'Invalid password' : "Неверно введен пароль";
        }
    }

    return $errors;
}
?>
