<?php

namespace App\Providers\_15_controller;

use App\Services\_15_controller\zexperiment\bind\_a_kelas\PaymentMethod;
use App\Services\_15_controller\zexperiment\singletone\_a_kelas\PaymentMethod as SingletonePaymentMethod;
use Illuminate\Support\ServiceProvider;

class ZExperimentServiceProvider extends ServiceProvider
{
    public function register()
    {

        // no singletone
        $this->app->bind(PaymentMethod::class, function () {
            return new PaymentMethod("A");
        });

        // singletone
        $this->app->singleton(SingletonePaymentMethod::class, function () {
            return new SingletonePaymentMethod("A");
        });

    
    }

}
