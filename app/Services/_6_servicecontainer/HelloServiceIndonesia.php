<?php

namespace App\Services\_6_servicecontainer;

class HelloServiceIndonesia implements HelloService
{

    public function hello(string $name): string
    {
        return "Halo $name";
    }
}
