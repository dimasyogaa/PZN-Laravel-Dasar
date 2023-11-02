<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectFrom(): RedirectResponse
    {
        return redirect("/redirect/to");
    }

    public function redirectTo(): string
    {
        return "Redirect To";
    }

    // Redirect To Named Routes
    public function redirectName(): RedirectResponse
    {
        return redirect()->route('redirect-hello', [
            "name" => "Yoga"
        ]);
    }

    public function redirectHello(string $name): string
    {
        return "Hello $name";
    }

    
}
