<?php

namespace App\Http\Middleware\_26_middleware\old_other;

use Closure;
use Illuminate\Http\Request;

class Contoh2Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $key, int $status)
    {
        $apiKey = $request->header("X-API-KEY");
        if ($apiKey == $key) {
            return $next($request);
        } else {
            return response("Access Denied", $status);
        }
    }
}
