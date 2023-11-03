<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        // session();
        // Session::
        $request->session()->put("userId", "dimas");
        $request->session()->put("isMember", true);
        return "OK";
    }

    public function getSession(Request $request): string
    {
        // get(key, defaultValue)
        $userId = $request->session()->get("userId", "guest");
        $isMember = $request->session()->get("isMember", false);

        return "User Id : $userId, is Member : $isMember";
    }
}
