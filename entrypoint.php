<?php

require 'autoload.php';

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;
use Portifolio\Workbench\Action\UserLoginAction;
use Portifolio\Workbench\Validation\PasswordValidation;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $newRequest = new Request('POST', 'store', true);

    try {
        $passwordValidator = new PasswordValidation($_POST['password']);
        $passwordValidator->validatePassword();
        $password = $passwordValidator->getSafePasswordObject();

        $getUsersList = new UserCreateAction(
            $newRequest,
            $_POST['name'],
            $_POST['email'],
            $password
        );
        $getUsersList();
    } catch (Exception $e) {
        http_response_code(400);
        $return = ['message' => "Invalid Data"];
        if ($e->getMessage() == "Email already exists!") {
            $return = ['message' => $e->getMessage()];
        }
        echo (json_encode($return));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $newRequest = new Request('POST', 'login', true);

    try {
        $passwordValidator = new PasswordValidation($_POST['password']);
        $passwordValidator->validatePassword();
        $password = $passwordValidator->getRawPasswordObject();

        $getUsersList = new UserLoginAction(
            $newRequest,
            $_POST['email'],
            $password
        );
        $getUsersList();
    } catch (Exception $e) {
        http_response_code(400);
        $return = ['message' => "Invalid Data"];
        if ($e->getMessage() == "Email already exists!") {
            $return = ['message' => $e->getMessage()];
        }
        echo (json_encode($return));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'profile') {
    session_start();
    $id = $_SESSION['id'];
    http_response_code(201);

    echo $id;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'logout') {
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
}
