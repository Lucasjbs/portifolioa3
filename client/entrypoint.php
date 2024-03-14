<?php

require 'autoload.php';

use Portifolio\Workbench\Action\AdminGetPageAction;
use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;
use Portifolio\Workbench\Action\UserLoginAction;
use Portifolio\Workbench\Action\UserSessionAction;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'sessionCheck') {
    $action = new UserSessionAction(
        new Request($_SERVER['REQUEST_METHOD'], $_GET['action'], true),
    );
    $action->runAction(false);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'sessionData') {
    $action = new UserSessionAction(
        new Request($_SERVER['REQUEST_METHOD'], $_GET['action'], true),
    );
    $action->runAction();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $action = new UserCreateAction(
        new Request($_SERVER['REQUEST_METHOD'], $_POST['action'], true),
        $_POST['name'],
        $_POST['email'],
        $_POST['password']
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'login') {
    $action = new UserLoginAction(
        new Request($_SERVER['REQUEST_METHOD'], $_POST['action'], true),
        $_POST['email'],
        $_POST['password']
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'logout') {
    session_start();
    $_SESSION = array();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['action'] === 'superUser') {
    $action = new AdminGetPageAction(new Request($_SERVER['REQUEST_METHOD'], $_GET['action'], true));
    $action->runAction();
}
