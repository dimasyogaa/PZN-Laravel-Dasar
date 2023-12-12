<?php

namespace App\Http\Controllers\_15_controller\_e_experiment;

use App\Http\Controllers\Controller;
use App\Services\_15_controller\zexperiment\bind\_a_kelas\BillEducation;
use App\Services\_15_controller\zexperiment\bind\_a_kelas\PaymentMethod;
use Illuminate\Http\Request;

class NonSingletonController extends Controller
{
    public function indexBind(PaymentMethod $paymentMethod, BillEducation $billPay)
    {
        $paymentMethod->setMethod("B");
        return "Non Singleton :  " . $billPay->pay(); // Non Singleton : Execute A

        /*
        tidak berubah menjadi B karena tidak singleton, laravel akan membuatkan objek baru terus menerus 
        */
    }
}
