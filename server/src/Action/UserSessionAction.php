<?php

namespace Portifolio\Workbench\Action;

use Exception;
use Portifolio\Workbench\Exception\InvalidSessionException;
use Portifolio\Workbench\Model\User;

class UserSessionAction
{
    private Request $request;
    private Response $response;

    public function __construct(Request $request)
    {
        $this->response = new Response();
        $this->request = $request;
    }

    public function runAction(bool $returnData = true): void
    {
        session_start();

        try {
            $this->validateSession();
            $user = new User();

            if ($returnData) {
                $this->returnData($user);
                return;
            }

            $user->validateUserId($_SESSION['id']);
        } catch (Exception $e) {
            $this->response->modifyResponseData(401, $e->getMessage(), []);
            $this->response->returnResponse();
            return;
        }

        $this->response->modifyResponseData(201, "success", []);
        $this->response->returnResponse();
    }

    public function returnData(User $user): void
    {
        $userData = $user->getUserData($_SESSION['id']);
        $this->response->modifyResponseData(201, "success", ["user" => $userData]);
        $this->response->returnResponse();
    }

    private function validateSession(): void
    {
        if (isset($_SESSION['id'])) {
            return;
        }

        $_SESSION = array();
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
        throw new InvalidSessionException("This session is invalid!");
    }
}
