<?php

namespace App\Http\Controllers\_25_redirect\_a_basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectBasicController extends Controller
{
    public function redirectFrom(): RedirectResponse
    {
        return redirect("/redirect/to");
    }

    public function redirectTo(): string
    {
        return "Redirect Basic : Redirect To";
    }
}
