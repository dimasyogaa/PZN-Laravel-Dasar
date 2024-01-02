<?php

namespace App\Http\Middleware\_26_middleware\_e_parameter_middleware;

use Closure;
use Illuminate\Http\Request;

class IniParameterMiddleware
{
    public function handle(Request $request, Closure $next, string $key, int $status)
    {
        $apiKey = $request->header("PARAMETER-X-API-KEY");
        if ($apiKey == $key) {
            return $next($request);
        } else {
            return response("Access Denied", $status);
        }
    }
}
