<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class InvalidSessionException extends Exception
{
    public const CODE = 1006;

    public function __construct(string $message)
    {
        parent::__construct($message, 1006);
    }
}