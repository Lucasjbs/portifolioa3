<?php

namespace Portifolio\Workbench\Validation;

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Model\User;

class UserValidation
{
    private int $id;
    private User $user;
    private Request $request;

    public function __construct(
        User $user,
        Request $request,
        int $id = 0
    ) {
        $this->id = $id;
        $this->user = $user;
        $this->request = $request;
    }

    function validate(): bool
    {
        //validate user->name
        //validate user->email
        return true;
    }
}
