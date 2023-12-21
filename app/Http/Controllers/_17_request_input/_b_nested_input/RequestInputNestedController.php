<?php

namespace App\Http\Controllers\_17_request_input\_b_nested_input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestInputNestedController extends Controller
{
    public function mengambilNestedInput(Request $request): string
    {
        $firstName = $request->input("namaku.depan");
        return  "Halo " . $firstName;
    }
}
