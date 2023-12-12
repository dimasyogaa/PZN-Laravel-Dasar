<?php

namespace App\Services\_15_controller\nosingletone;

class ServiceClass implements ServiceInterface
{

    public function woi(string $name): string
    {
        return "Woi oi oi $name";
    }
}