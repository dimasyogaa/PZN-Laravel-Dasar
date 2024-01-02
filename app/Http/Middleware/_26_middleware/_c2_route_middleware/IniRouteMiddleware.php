<?php

namespace App\Http\Middleware\_26_middleware\_c2_route_middleware;

use Closure;
use Illuminate\Http\Request;

class IniRouteMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header("ROUTE-X-API-KEY");
        if ($apiKey == "RouteMiddleware-PZN-Codimas") {
            return $next($request);
        } else {
            return response("Access Denied", 401);
        }
    }
}
