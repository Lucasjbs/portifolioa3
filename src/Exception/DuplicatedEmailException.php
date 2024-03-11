<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class DuplicatedEmailException extends Exception
{
    public const CODE = 1003;

    public function __construct(string $message)
    {
        parent::__construct($message, 1003);
    }
}