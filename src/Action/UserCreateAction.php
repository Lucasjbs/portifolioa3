<?php

namespace Portifolio\Workbench\Action;

use Portifolio\Workbench\Model\Password;
use Portifolio\Workbench\Model\User;
use Portifolio\Workbench\Validation\UserValidation;

class UserCreateAction
{
    private Request $request;
    private User $user;

    function __construct(
        Request $request,
        string $name,
        string $email,
        Password $password,
    ) {
        $this->user = new User($name, $email, $password);
        $this->request = $request;

        $userValidator = new UserValidation($this->user, $this->request);
        $userValidator->validate();
    }

    function __invoke()
    {
        $this->user->createNewUser();
        return http_response_code(201);
    }
}
