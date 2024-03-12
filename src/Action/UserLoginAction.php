<?php

namespace Portifolio\Workbench\Action;

use Exception;
use Portifolio\Workbench\Model\User;
use Portifolio\Workbench\Validation\PasswordValidation;
use Portifolio\Workbench\Validation\UserValidation;

class UserLoginAction
{
    private Request $request;
    private Response $response;
    private User $user;

    private string $email;
    private string $rawPassword;

    function __construct(
        Request $request,
        string $email,
        string $rawPassword,
    ) {
        $this->response = new Response();
        $this->request = $request;

        $this->email = $email;
        $this->rawPassword = $rawPassword;

        $this->certifyValidUser();
    }

    private function runAction()
    {
        try {
            $this->user->checkLoginCredentials();

            // session_start();
            // $_SESSION["id"] = $this->user->getId();

            $this->response->modifyResponseData(201, "success", []);
        } catch (Exception $e) {
            $this->response->modifyResponseData(400, $e->getMessage(), ['error_index' => $e->getCode()]);
        }

        $this->response->returnResponse();
    }

    private function certifyValidUser(): void
    {
        try {
            $passwordValidator = new PasswordValidation($this->rawPassword);
            $passwordValidator->validatePassword();
            $password = $passwordValidator->getRawPasswordObject();

            $this->user = new User("", $this->email, $password);

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
