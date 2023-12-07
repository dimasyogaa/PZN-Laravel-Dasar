<?php

namespace App\Providers\_7_service_provider\_b_registrasi_dependency;

use App\Data\_7_serviceprovider\Bar;
use App\Data\_7_serviceprovider\Foo;
use Illuminate\Support\ServiceProvider;

class BFooBarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        // disarankan jangan melakukan kode yang membutuhkan dependency apapun karena di blok ini bisa saja dependency masih proses disiapkan, sehingga terjadi error
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // boleh melakukan kode apapun selain registrasi dependency
        // echo "Ini Boot : BFooBarServiceProvider "; 
    }
}
