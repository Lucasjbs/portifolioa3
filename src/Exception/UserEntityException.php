<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class UserEntityException extends Exception
{
    public const CODE = 1005;

    public function __construct(string $message)
    {
        parent::__construct($message, 1005);
    }
}