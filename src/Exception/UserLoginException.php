<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class UserLoginException extends Exception
{
    public const CODE = 1004;

    public function __construct(string $message)
    {
        parent::__construct($message, 1004);
    }
}