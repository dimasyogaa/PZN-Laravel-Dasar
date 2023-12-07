<?php

namespace App\Services\_7_serviceprovider;

class HelloServiceIndonesia implements HelloService
{

    public function hello(string $name): string
    {
        return "Halo $name";
    }
}
