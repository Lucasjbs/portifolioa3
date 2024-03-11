<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class InvalidEmailException extends Exception
{
    public const CODE = 1002;

    public function __construct(string $message)
    {
        parent::__construct($message, 1002);
    }
}