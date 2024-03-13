<?php

namespace Portifolio\Workbench\Action;

class Request
{
    public string $method;
    public string $action;
    public bool $async;

    function __construct(string $method, string $action, bool $async = false)
    {
        $this->method = $method;
        $this->action = $action;
        $this->async = $async;
    }
}