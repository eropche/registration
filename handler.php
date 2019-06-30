<?php
    require "includes/bootstrap.php";
    require "src/validation.php";
    require "src/loginService.php";
    require "src/registrationService.php";

    if (!empty($_POST)) {
        header('Content-Type: application/json');

        if (isset($_POST['name']) && isset($_POST['surname'])) {
            $userArray = $_POST;
            $userArray['image'] = $_FILES['image'];
            $errors = validateRegistrationForm($userArray, $maxSizeImage);
            if (empty($errors)) {
                if (register($userArray)) {
                    http_response_code(201);
                    echo json_encode([
                        'success' => true
                    ]);
                    exit();
                }
                http_response_code(500);
                echo json_encode([
                    'success' => false
                ]);
                exit();
            }
        } else {
            $errors = validateLoginForm($_POST);
            if (empty($errors)) {
                if (login($_POST['email'])) {
                    http_response_code(201);
                    echo json_encode([
                        'success' => true
                    ]);
                    exit();
                }
                http_response_code(500);
                echo json_encode([
                    'success' => false
                ]);
                exit();
            }
        }
        
        http_response_code(422);
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
        exit();
    }
?>