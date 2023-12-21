<?php

namespace App\Http\Controllers\_19_filter_request_input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BFilterMergeController extends Controller
{
    public function filterMerge(Request $request): string
    {

        // ada maupun tidak ada key admin pada request yang dikirim, 
        // maka pasti akan ada dan dibuatkan/ditimpa dengan key dan value seperti ini "admin" => false
        $request->merge(["admin" => false]);
        $user = $request->input();
        return json_encode($user);
    }


    public function filterMergeIfMissing(Request $request): string
    {

        // jika ada key admin, maka tidak dibuatkan/ditimpa dengan key dan value seperti ini "admin" => false
        // jika tidak ada key admin, maka dibuatkan/ditimpa dengan key dan value seperti ini "admin" => false
        $request->mergeIfMissing(["admin" => false]);
        $user = $request->input();
        return json_encode($user);
    }
}
