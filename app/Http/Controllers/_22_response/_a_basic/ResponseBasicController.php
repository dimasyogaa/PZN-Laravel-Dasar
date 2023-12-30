<?php

namespace App\Http\Controllers\_22_response\_a_basic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ResponseBasicController extends Controller
{
    public function responseBasic(): Response
    {
        return response("basic response");
    }

}
