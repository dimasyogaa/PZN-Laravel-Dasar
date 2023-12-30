<?php

namespace App\Http\Controllers\_22_response\_b_httpheader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ResponseHttpHeaderController extends Controller
{
    public function responseHeader(): Response
    {

        $body = [
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ];

        // melakukan response JSON secara manual
        return response(json_encode($body), 200)
            ->header("Content-Type", "application/json")
            ->withHeaders([
                "Author" => "Codimas Production",
                "App" => "Belajar Laravel"
            ]);
    }
}
