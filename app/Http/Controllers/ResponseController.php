<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("hello response");
    }

    // Response Header
    public function header(Request $request): Response
    {

        $body = [
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ];

        return response(json_encode($body), 200)
            ->header("Content-Type", "application/json")
            ->withHeaders([
                "Author" => "Codimas Production",
                "App" => "Belajar Laravel"
            ]);
    }
}
