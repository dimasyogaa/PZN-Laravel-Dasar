<?php

namespace App\Http\Controllers\_22_response\_c_response_type;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseTypeController extends Controller
{
    public function responseView(): Response
    {
        return response()->view("_22_response.typeview", ["name" => "ResponseTypeController : View"]);
    }

    public function responseJson(): JsonResponse
    {
        $body = [
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ];

        return response()->json($body);
    }

    public function responseFile(): BinaryFileResponse
    {
        $pathToFile = public_path("20-21-file-storage-upload/storage-link/21-file-upload/yogadimas1080p.png");
        return response()->file($pathToFile);
    }

    public function responseDownload(): BinaryFileResponse
    {
        $pathToFile = storage_path("app/public/21-file-upload/yogadimas1080p.png");
        $name = "logo yd 1080p.png";
        return response()->download($pathToFile, $name);
    }
}
