<?php

namespace App\Http\Middleware\_26_middleware\_d_group_middleware;

use Closure;
use Illuminate\Http\Request;

class IniAMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header("A-X-API-KEY");
        if ($apiKey == "A-PZN-Codimas") {
            return $next($request);
        } else {
            return response("Access Denied", 401);
        }
    }
}
