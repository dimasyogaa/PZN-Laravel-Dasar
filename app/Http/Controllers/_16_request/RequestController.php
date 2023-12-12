<?php

namespace App\Http\Controllers\_16_request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function request(Request $request, string $name = "kosong"): string
    {
        return $request->path() . PHP_EOL .
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->header("Accept") . PHP_EOL .
            $name  . PHP_EOL ;
    }

    public function webRequest(Request $request, string $name = "kosong"): string
    {

        $path = $request->path();
        $url =  $request->url();
        $fullUrl =  $request->fullUrl();
        $method =  $request->method();
        $header =  $request->header("Accept");
        
        return 
        "Path = $path</br>" . 
        "Url = $url</br>" .
        "Full Url = $fullUrl</br>" . 
        "method = $method</br>" .
        "Header = $header</br>" .
            $name  . PHP_EOL ;
    }
}
