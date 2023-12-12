<?php

namespace App\Services\_15_controller\zexperiment\bind\_a_kelas;

class BillEducation 
{
  
    private PaymentMethod $paymentMethod;

    public function __construct(PaymentMethod $method)
    {
        $this->paymentMethod = $method;
    }  


    public function pay() {
        return $this->paymentMethod->execute();
    }

}