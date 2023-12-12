<?php

namespace App\Http\Controllers\_15_controller\_abcd_pzn;

use App\Http\Controllers\Controller;
use App\Services\_15_controller\singletone\ServiceClass;
use App\Services\_15_controller\singletone\ServiceInterface;
use Illuminate\Http\Request;

class CDISingletonHelloController extends Controller
{

    public ServiceInterface $helloService;


    public function __construct(ServiceInterface $helloService)
    {
        $this->helloService = $helloService;
    }

    public function woi(string $name): string
    {
        return $this->helloService->woi($name);
    }
}
