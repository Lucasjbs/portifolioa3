<?php

namespace Portifolio\Workbench\Action;

use Portifolio\Workbench\Model\Password;
use Portifolio\Workbench\Model\User;
use Portifolio\Workbench\Validation\UserValidation;

class UserLoginAction
{
    private Request $request;
    private User $user;

    function __construct(
        Request $request,
        string $email,
        Password $password,
    ) {
        $this->user = new User("", $email, $password);
        $this->request = $request;

        $userValidator = new UserValidation($this->user, $this->request);
        $userValidator->validate();
    }

    function __invoke()
    {
        if ($this->user->checkLoginCredentials()) {
            // create user $session credentials
            // session_start();
            // $isLoggedIn = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"];
            // $sessionToken = bin2hex(random_bytes(32));
    
            // $_SESSION["session_token"] = $sessionToken;

            session_start();
            $_SESSION["id"] = $this->user->getId();

            return http_response_code(201);
        }
        return http_response_code(400);
    }
}
