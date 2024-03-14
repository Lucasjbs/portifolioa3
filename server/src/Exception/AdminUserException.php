<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class AdminUserException extends Exception
{
    public const CODE = 1007;

    public function __construct(string $message)
    {
        parent::__construct($message, 1007);
    }
}