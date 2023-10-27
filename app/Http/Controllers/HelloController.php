<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

// cara membuat controller di terminal :
// php artiasan make:controller HelloController
class HelloController extends Controller
{
    public function hello(): string {
        return "Hello World";
    }
}
