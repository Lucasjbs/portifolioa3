<?php

require 'autoload.php';

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;
use Portifolio\Workbench\Action\UserLoginAction;
use Portifolio\Workbench\Action\UserSessionAction;
use Portifolio\Workbench\Action\UserSessionDataAction;

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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'sessionData') {
    $action = new UserSessionAction(
        new Request('POST', 'sessionData', true),
    );
    $action->runAction();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'sessionCheck') {
    $action = new UserSessionAction(
        new Request('POST', 'sessionCheck', true),
    );
    $action->runAction(false);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'logout') {
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
}
