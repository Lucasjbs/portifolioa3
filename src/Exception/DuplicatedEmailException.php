<?php

namespace Portifolio\Workbench\Exception;

use Exception;

class DuplicatedEmailException extends Exception
{
    public const CODE = 1003;

    public function __construct()
    {
        parent::__construct("This email already exists!", 1003);
    }
}