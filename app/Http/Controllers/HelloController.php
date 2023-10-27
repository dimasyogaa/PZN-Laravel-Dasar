<?php

namespace App\Http\Controllers;

use App\Services\HelloService;
use Illuminate\Http\Request;

// cara membuat controller di terminal :
// php artiasan make:controller HelloController
class HelloController extends Controller
{

    private HelloService $helloService;


    // sebelumnya Hello Service telah didaftarkan di service container melalui service provider
    // sehingga otomatis diinject dependencynya oleh laravel dari service container
    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }

    public function hello(string $name): string
    {
        return $this->helloService->hello($name);
    }
}
