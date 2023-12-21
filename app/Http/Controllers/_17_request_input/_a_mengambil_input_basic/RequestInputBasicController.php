<?php

namespace App\Http\Controllers\_17_request_input\_a_mengambil_input_basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestInputBasicController extends Controller
{

    /*
    Penggunaan $request->input("namaku") ini bertujuan untuk mengambil data dari parameter yang dikirimkan melalui metode POST atau GET (HTTP METHDO), bukan dari bagian URI.
    */
    public function mengambilInputHTTPMethod(Request $request): string
    {
        $namaku = $request->input("namaku", "default");
        return "Halo $namaku";
    }


    // jika ingin mengambil data bagian URI
    public function mengambilInputURI($namaku): string
    {
        return "Halo $namaku!";
    }

}
