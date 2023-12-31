<?php

namespace App\Http\Controllers\_25_redirect\_bcd_redirect_to\_b_named_route;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectToNamedRouteController extends Controller
{
    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect-to-named-route', [
            "name" => "Yoga"
        ]);
    }

    public function redirectHello(string $name): string
    {
        return "Redirect To Named Route : redirectHello $name";
    }
}
