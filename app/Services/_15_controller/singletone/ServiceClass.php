<?php

namespace App\Services\_15_controller\singletone;

class ServiceClass implements ServiceInterface
{

    private $counter = 0;

    public function woi(string $name): string
    {
        $this->counter++;
        return "Woi oi oi $name - $this->counter";
    }
   
}