<?php

namespace App\Providers\_7_service_provider\_e_binding_singletons_properties;

use App\Services\_7_serviceprovider\HelloService;
use App\Services\_7_serviceprovider\HelloServiceIndonesia;
use Illuminate\Support\ServiceProvider;

class EHelloServiceServiceProvider extends ServiceProvider
{

    // properties singletons hanya untuk kasus yang sederhana 
    public array $singletons = [
        HelloService::class => HelloServiceIndonesia::class
    ];

}
