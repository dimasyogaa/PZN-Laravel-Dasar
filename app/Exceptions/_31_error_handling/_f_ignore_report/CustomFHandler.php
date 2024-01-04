<?php

namespace App\Exceptions\_31_error_handling\_f_ignore_report;

use App\Exceptions\_31_error_handling\_f_ignore_report\IgnoreReportValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class CustomFHandler extends ExceptionHandler
{


    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        IgnoreReportValidationException::class
    ];


}
