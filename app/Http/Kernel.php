<?php

namespace App\Http;

use App\Http\Middleware\_26_middleware\_c1_global_middleware\IniGlobalMiddleware;
use App\Http\Middleware\_26_middleware\_c2_route_middleware\IniRouteMiddleware;
use App\Http\Middleware\_26_middleware\_d_group_middleware\IniAMiddleware;
use App\Http\Middleware\_26_middleware\_d_group_middleware\IniBMiddleware;
use App\Http\Middleware\_26_middleware\_d_group_middleware\IniCMiddleware;
use App\Http\Middleware\_26_middleware\_e_parameter_middleware\IniParameterMiddleware;
use App\Http\Middleware\_26_middleware\old_other\ContohMiddleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // \App\Http\Middleware\ContohMiddleware::class //jika mau middleware ini global

        // _26_middleware - global
        // IniGlobalMiddleware::class
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'pzn-codimas' => [
            ContohMiddleware::class
        ],
        'pzn-codimas-2' => [
            "contoh2:PZN-Codimas,401"
        ],


        // _26_middleware - group
        'ini-group-middleware' => [
            IniAMiddleware::class,
            IniBMiddleware::class,
            "iniAliasCMiddleware"
        ],

        // _26_middleware - parameter
        'ini-group-parameter-middleware' => [
            "iniAliasParamMiddleware:Parameter-PZN-Codimas,401"
        ]
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'contoh' => Middleware\_26_middleware\old_other\ContohMiddleware::class, //alias
        'contoh2' => Middleware\_26_middleware\old_other\Contoh2Middleware::class,


        // _26_middleware - route alias
        'iniAliasRouteMiddleware' => IniRouteMiddleware::class,

        // for alias in group
        'iniAliasCMiddleware' => IniCMiddleware::class,

        // for parameter middleware
        'iniAliasParamMiddleware' => IniParameterMiddleware::class

    ];
}
