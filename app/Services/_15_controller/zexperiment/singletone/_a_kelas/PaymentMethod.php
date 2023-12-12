<?php

namespace App\Services\_15_controller\zexperiment\singletone\_a_kelas;

class PaymentMethod
{

    private $paymentMethod;

    
    public function setMethod($method) {
        $this->paymentMethod = $method;
    }

    public function __construct($method)
    {
        $this->paymentMethod = $method;
    }  


    public function execute() {
        return "Execute " . $this->paymentMethod;
    }

    
}