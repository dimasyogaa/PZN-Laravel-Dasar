<?php

namespace App\Http\Controllers\_30_session;

use App\Http\Controllers\Controller;
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

    public function getSessionForUnitTesting(Request $request): string
    {
        // for unit testing
        $idPengguna = $request->session()->get("idPengguna", "guest");
        $anggota = $request->session()->get("anggota", false);


        return "Id Pengguna : $idPengguna, Anggota : $anggota";
    }
}
