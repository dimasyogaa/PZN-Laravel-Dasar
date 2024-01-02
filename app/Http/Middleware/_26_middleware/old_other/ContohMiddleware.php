<?php

namespace App\Http\Middleware\_26_middleware\old_other;

use Closure;
use Illuminate\Http\Request;

class ContohMiddleware
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
        $apiKey = $request->header("X-API-KEY");
        if ($apiKey == "PZN-Codimas") {
            return $next($request);
        } else {
            return response("Access Denied", 401);
        }
    }
}
