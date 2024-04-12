<?php

namespace Portifolio\Workbench\Action;

use Exception;
use Portifolio\Workbench\Exception\AdminUserException;
use Portifolio\Workbench\Model\User;
use Portifolio\Workbench\Service\AdminProtectedData;

class AdminGetPageAction
{
    private Request $request;
    private Response $response;

    public function __construct(Request $request)
    {
        $this->response = new Response();
        $this->request = $request;
    }

    public function runAction(?int $pageIndex = null): void
    {
        session_start();

        try {
            $user = new User();
            $this->validateSession($user);
            $data = $this->returnAdminFiles($pageIndex);
        } catch (Exception $e) {
            $this->response->modifyResponseData(401, $e->getMessage(), []);
            $this->response->returnResponse();
            return;
        }

        $this->response->modifyResponseData(201, "success", ["content" => $data]);
        $this->response->returnResponse();
    }

    private function validateSession(User $user): void
    {
        if (isset($_SESSION['id'])) {
            $user->checkAdminStatus($_SESSION['id']);
            return;
        }

        $_SESSION = array();
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
        throw new AdminUserException("This session is invalid!");
    }

    private function returnAdminFiles(?int $pageIndex): string
    {
        $service = new AdminProtectedData();
        if($pageIndex){
            return $service->getTextlogPage($pageIndex);
        }
        return $service->getIndexPage();
    }
}
