<?php

namespace App\Providers\_7_service_provider\_f_deffered_provider;

use App\Data\_7_serviceprovider\Bar;
use App\Data\_7_serviceprovider\Foo;
use App\Data\_7_serviceprovider\ZBar;
use App\Data\_7_serviceprovider\ZFoo;
use App\Services\_7_serviceprovider\HelloService;
use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Support\DeferrableProvider;

class FDefferedServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function register()
    {
        // echo "\n\nDeferred ServiceProvider : ";
        // echo "\nKetika Ada Dependency yang dibutuhkan maka service provider ini diload di homepage laravel --  ";
        // echo "\nDi Unit/Integration Test, mau ada yang dibutuhkan atau tidak, pasti tetap akan diload.";
        // echo "\nDi HomePage laravel, hanya akan diload ketika ada yang membutuhkan dependency pada service provider ini.\n\n";
        $this->app->singleton(ZFoo::class, function () {
            return new ZFoo();
        });

        $this->app->singleton(ZBar::class, function ($app) {
            return new ZBar($app->make(ZBar::class));
        });
    }


    public function boot()
    {
       
    }


    // pasti akan diload pada unit/integration testing baik itu dibutuhkan atau tidak 
    // tapi ketika dijalankan live server(php artisan serve) maka 
    // service provider ini hanya diload ketika ada yang butuh dependency di service provider ini
    public function provides()
    {
        return [ZFoo::class, ZBar::class];

    }
}
