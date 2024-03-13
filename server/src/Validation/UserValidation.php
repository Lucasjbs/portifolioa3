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
            throw new InvalidNameException("Name length must be between 4 and 45 characters!");
        }

        if (strlen($name) > 45) {
            throw new InvalidNameException("Name length must be between 4 and 45 characters!");
        }

        if (preg_match('/[$#\/@:;\-<>\(\)\[\]\{\}]/', $name)) {
            throw new InvalidNameException("Name cannot contain special characters!");
        }

        return;
    }

    private function emailValidator(string $email): void
    {
        if (($this->isEditRoute() || $this->isCreateRoute()) && $email == ""){
            return;
        }

        if (!preg_match('/^[A-Za-z0-9]+@(gmail\.com|hotmail\.com)$/', $email)) {
            throw new InvalidEmailException("Email must be a valid Gmail or Hotmail!");
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
