<?php

namespace App\Http\Controllers\_19_filter_request_input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AFilterOnlyExceptController extends Controller
{
    public function filterOnly(Request $request): string
    {
        // mengambil data hanya yang memiliki key namaku.depan dan namaku.akhir
        $name = $request->only(["namaku.depan", "namaku.akhir"]);
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        // mengambil semua data kecuali data yang memiliki key admin
        $name = $request->except(["admin"]);
        return json_encode($name);
    }
}
