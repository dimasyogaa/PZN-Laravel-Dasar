<?php

namespace App\Http\Controllers\_24_cookie;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(): Response
    {
        return response("Hello Cookie")
            ->cookie("User-Id", "yoga", 1000, "/") // 1000 menit
            ->cookie("Is-Member", "true", 1000, "/");
    }

    public function getCookie(Request $request): JsonResponse
    {

        // $request->cookie(name, defaultValue)
        return response()->json([
            "userId" => $request->cookie("User-Id", "guest"),
            "isMember" => $request->cookie("Is-Member", "false")
        ]);
    }

    public function clearCookie(): Response
    {
        return response("Clear Cookie")
            ->withoutCookie("User-Id")
            ->withoutCookie("Is-Member");
    }
}
