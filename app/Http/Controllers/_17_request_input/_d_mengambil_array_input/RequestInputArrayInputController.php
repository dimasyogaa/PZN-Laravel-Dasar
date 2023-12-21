<?php

namespace App\Http\Controllers\_17_request_input\_d_mengambil_array_input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestInputArrayInputController extends Controller
{
    
    public function mengambilDataNamaPadaSemuaArrayProducts(Request $request): string
    {
        $names = $request->input("products.*.name");
        return json_encode($names);
    }

}
