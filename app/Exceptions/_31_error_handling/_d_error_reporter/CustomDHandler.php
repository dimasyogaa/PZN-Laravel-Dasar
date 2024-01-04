<?php

namespace App\Exceptions\_31_error_handling\_d_error_reporter;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class CustomDHandler extends ExceptionHandler
{
    public function register()
    {
        $this->reportable(function (Throwable $e) {
             var_dump($e);
            return false;
        });
         $this->reportable(function (Throwable $e) {
             var_dump($e);
         });
         $this->reportable(function (Throwable $e) {
             var_dump($e);
         });
    }
}
