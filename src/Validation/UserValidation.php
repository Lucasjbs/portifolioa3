<?php

namespace Portifolio\Workbench\Validation;

use Portifolio\Workbench\Action\Request;
use Portifolio\Workbench\Exception\InvalidEmailException;
use Portifolio\Workbench\Exception\InvalidNameException;
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

    public function validate(): bool
    {
        $this->nameValidator($this->user->getName());
        $this->emailValidator($this->user->getEmail());

        return true;
    }

    private function nameValidator(string $name): void
    {
        if (($this->isEditRoute() || $this->isCreateRoute()) && strlen($name) < 4) {
            throw new InvalidNameException("Too few characters for Name!");
        }

        if (strlen($name) > 45) {
            throw new InvalidNameException("Name lenght too large!");
        }

        if (preg_match('/[$#\/@:;\-<>\(\)\[\]\{\}]/', $name)) {
            throw new InvalidNameException("Invalid character was used for Name!");
        }

        return;
    }

    private function emailValidator(string $email): void
    {
        if (($this->isEditRoute() || $this->isCreateRoute()) && $email == ""){
            return;
        }

        if (!preg_match('/^[A-Za-z0-9]+@(gmail\.com|hotmail\.com)$/', $email)) {
            throw new InvalidEmailException("Invalid Email format!");
        }

        return;
    }

    private function isCreateRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'store') return true;

        return false;
    }

    private function isEditRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'edit') return true;

        return false;
    }

    private function isDeleteRoute(): bool
    {
        if ($this->request->method === 'POST' && $this->request->action === 'delete') return true;

        return false;
    }
}
