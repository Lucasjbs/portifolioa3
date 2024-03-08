<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class InvalidPasswordException extends Exception
{
    public const CODE = 1000;

    public function __construct(string $message)
    {
        parent::__construct($message, 1000);
    }
}