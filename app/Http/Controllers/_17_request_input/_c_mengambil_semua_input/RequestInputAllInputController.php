<?php

namespace App\Http\Controllers\_17_request_input\_c_mengambil_semua_input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestInputAllInputController extends Controller
{
    public function mengambilSemuaInput(Request $request): string
    {
        $all = $request->input(); //return array
        return json_encode($all);
    }
}
