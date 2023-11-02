<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    // Response Type
    public function responseView(Request $request): Response
    {
        return response()->view("hello", ["name" => "Codimas Production"]);
    }

    public function responseJson(Request $request): JsonResponse
    {
        $body = [
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ];

        return response()->json($body);
    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        $pathToFile = storage_path("app/public/pictures/yd1080p.png");
        return response()->file($pathToFile);
    }

    public function responseDownload(Request $request): BinaryFileResponse
    {
        $pathToFile = storage_path("app/public/pictures/yd1080p.png");
        $name = "logo yd 1080p.png";
        return response()->download($pathToFile, $name);
    }
}
