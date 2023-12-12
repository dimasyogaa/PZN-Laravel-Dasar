<?php

namespace App\Providers\_15_controller;

use App\Services\_15_controller\singletone\ServiceClass;
use App\Services\_15_controller\singletone\ServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ServiceClassSingletonServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ServiceInterface::class => ServiceClass::class
    ];

    public function provides()
    {
        return [ServiceInterface::class];

    }
}
