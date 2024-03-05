<?php

namespace Portifolio\Workbench\Action;

// use Portifolio\Interaction\Model\User;
// use Portifolio\Interaction\Validation\UserValidation;

class UserCreateAction
{
    private Request $request;
    // private User $user;

    function __construct(
        Request $request,
        string $name,
        string $email,
        string $password,
    ) {
        // $this->user = new User($name, $age, $isMarried, $phone);
        $this->request = $request;

        // $validator = new UserValidation($this->user, $this->request);
        // $validator->validate();
    }

    function __invoke()
    {
        // $this->user->createNewUser();
        return "Status: success";
    }
}
