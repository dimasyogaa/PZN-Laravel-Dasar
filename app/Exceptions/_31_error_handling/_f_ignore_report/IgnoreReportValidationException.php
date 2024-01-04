<?php

namespace App\Exceptions\_31_error_handling\_f_ignore_report;

class IgnoreReportValidationException extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
