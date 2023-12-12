<?php

namespace App\Http\Controllers\_15_controller\_e_experiment;

use App\Http\Controllers\Controller;
use App\Services\_15_controller\singletone\Counter;
use App\Services\_15_controller\singletone\CounterChild;
use App\Services\_15_controller\singletone\ExperimentInterface;
use App\Services\_15_controller\zexperiment\singletone\_a_kelas\BillEducation;
use App\Services\_15_controller\zexperiment\singletone\_a_kelas\PaymentMethod;
use Illuminate\Http\Request;

class SingletonController extends Controller
{

    public function indexSingletone(PaymentMethod $paymentMethod, BillEducation $billPay)
    {
        $paymentMethod->setMethod("B");
        return "Singleton :  " . $billPay->pay();
    }

    
}
