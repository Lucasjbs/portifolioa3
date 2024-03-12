<?php

require 'autoload.php';

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;
use Portifolio\Workbench\Action\UserLoginAction;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $action = new UserCreateAction(
        new Request('POST', 'store', true),
        $_POST['name'],
        $_POST['email'],
        $_POST['password']
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $action = new UserLoginAction(
        new Request('POST', 'login', true),
        $_POST['email'],
        $_POST['password']
    );
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
