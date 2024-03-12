<?php

namespace Portifolio\Workbench\Action;

use Exception;
use Portifolio\Workbench\Exception\DuplicatedEmailException;
use Portifolio\Workbench\Exception\UserEntityException;
use Portifolio\Workbench\Model\User;
use Portifolio\Workbench\Validation\PasswordValidation;
use Portifolio\Workbench\Validation\UserValidation;
use Throwable;

class UserCreateAction
{
    private Request $request;
    private Response $response;
    private User $user;

    private string $name;
    private string $email;
    private string $rawPassword;

    function __construct(
        Request $request,
        string $name,
        string $email,
        string $rawPassword,
    ) {
        $this->response = new Response();
        $this->request = $request;

        $this->name = $name;
        $this->email = $email;
        $this->rawPassword = $rawPassword;

        $this->certifyValidUser();
    }

    private function runAction()
    {
        try {
            $this->user->createNewUser();
            $this->response->modifyResponseData(201, "success", []);
        } catch (DuplicatedEmailException $e) {
            $this->response->modifyResponseData(400, $e->getMessage(), ['error_index' => $e->getCode()]);
        } catch (UserEntityException $e) {
            $this->response->modifyResponseData(400, "Internal server error!", ['error_index' => $e->getCode()]);
        } catch (Throwable $th) {
            $this->response->modifyResponseData(400, "Internal server error!", ['stream' => "Unknow error!"]);
        }

        $this->response->returnResponse();
    }

    private function certifyValidUser(): void
    {
        try {
            $passwordValidator = new PasswordValidation($this->rawPassword);
            $passwordValidator->validatePassword();
            $password = $passwordValidator->getSafePasswordObject();

            $this->user = new User($this->name, $this->email, $password);

            $userValidator = new UserValidation($this->user, $this->request);
            $userValidator->validate();
        } catch (Exception $e) {
            $this->response->modifyResponseData(400, $e->getMessage(), ['error_index' => $e->getCode()]);
            $this->response->returnResponse();
            return;
        }

        $this->runAction();
    }
}
