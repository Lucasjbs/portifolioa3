<?php

require 'autoload.php';

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;
use Portifolio\Workbench\Validation\PasswordValidation;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $newRequest = new Request('POST', 'store', true);

    try {
        $passwordValidator = new PasswordValidation($_POST['password']);
        $password = $passwordValidator->validatePassword();
        
        $getUsersList = new UserCreateAction(
            $newRequest,
            $_POST['name'],
            $_POST['email'],
            $_POST['password']
        );
        $getUsersList();
    } catch (\Exception $e) {
        //backend log - prevent hacking
    }

}
