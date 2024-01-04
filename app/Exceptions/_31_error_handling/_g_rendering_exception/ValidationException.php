<?php

namespace App\Exceptions\_31_error_handling\_g_rendering_exception;

class ValidationException extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
