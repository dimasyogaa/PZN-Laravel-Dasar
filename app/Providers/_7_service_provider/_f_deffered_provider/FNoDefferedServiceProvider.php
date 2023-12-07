<?php

namespace App\Providers\_7_service_provider\_f_deffered_provider;

use App\Data\_7_serviceprovider\ZBar;
use App\Data\_7_serviceprovider\ZFoo;
use Illuminate\Support\ServiceProvider;

class FNoDefferedServiceProvider extends ServiceProvider
{
    public function register()
    {
        // echo "\n\nNo Deferred ServiceProvider : ";
        // echo "\nAda Dependency yang dibutuhkan atau tidak, tetap akan akan diload di homepage laravel --  ";
        // echo "\nDi Unit/Integration Test, mau ada yang dibutuhkan atau tidak, pasti tetap akan diload.";
        // echo "\nDi HomePage laravel, tetap akan akan diload meskipun tidak ada yang membutuhkan.\n\n";
        $this->app->singleton(ZFoo::class, function () {
            return new ZFoo();
        });

        $this->app->singleton(ZBar::class, function ($app) {
            return new ZBar($app->make(ZBar::class));
        });
    }


    public function boot()
    {
        //
    }
}
