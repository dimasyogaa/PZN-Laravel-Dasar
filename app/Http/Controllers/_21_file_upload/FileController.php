<?php

namespace App\Http\Controllers\_21_file_upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request): string
    {
        // $request->allFiles();
        $picture = $request->file("picture");

        // disimpan di dalam folder file_upload_pictures
        $picture->storePubliclyAs("21-file-upload", $picture->getClientOriginalName(), "public");
        //   $picture->storePubliclyAs(path, file name, disk type (filesystem.php));


        return "OK " . $picture->getClientOriginalName();
    }
}
