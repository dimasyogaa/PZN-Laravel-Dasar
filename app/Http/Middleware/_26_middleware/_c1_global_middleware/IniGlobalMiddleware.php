<?php

namespace App\Http\Middleware\_26_middleware\_c1_global_middleware;

use Closure;
use Illuminate\Http\Request;

class IniGlobalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header("GLOBAL-X-API-KEY");
        if ($apiKey == "GlobalMiddleware-PZN-Codimas") {
            return $next($request);
        } else {
            return response("Access Denied", 401);
        }
    }
}
