<?php

namespace App\Http\Controllers\_15_controller\_abcd_pzn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ABBasicHelloController extends Controller
{
    public function basicHello(): string {
        return "ABBasicHelloController : hello word from function basicHello()";
    }
}
