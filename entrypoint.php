<?php

require 'autoload.php';

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Action\UserCreateAction;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'store') {
    $newRequest = new Request('POST', 'store', true);

    try {
        $getUsersList = new UserCreateAction(
            $newRequest,
            $_POST['name'],
            $_POST['email'],
            $_POST['password']
        );
        $getUsersList();
    } catch (\Exception $e) {
    }

}
