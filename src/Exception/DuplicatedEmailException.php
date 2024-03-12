<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class DuplicatedEmailException extends Exception
{
    public const CODE = 1003;

    public function __construct()
    {
        parent::__construct("Email already exists!", 1003);
    }
}