<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        // $request->allFiles();
        $picture = $request->file("picture");

        // disimpan di dalam folder picture
        $picture->storePubliclyAs("picture", $picture->getClientOriginalName(), "public");


        return "OK " . $picture->getClientOriginalName();
    }
}
