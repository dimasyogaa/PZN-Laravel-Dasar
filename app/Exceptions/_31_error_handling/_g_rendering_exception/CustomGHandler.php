<?php

namespace App\Exceptions\_31_error_handling\_g_rendering_exception;

use App\Exceptions\_31_error_handling\_f_ignore_report\IgnoreReportValidationException;
use App\Exceptions\_31_error_handling\_g_rendering_exception\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class CustomGHandler extends ExceptionHandler
{

    protected $dontReport = [
        IgnoreReportValidationException::class,
        ValidationException::class
    ];


    public function register()
    {

        // G Rendering Exception
        $this->renderable(function (ValidationException $exception, Request $request) {
            return response("Renderable : Bad Request", 400);
        });
    }
}
