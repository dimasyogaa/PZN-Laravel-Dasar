<?php

namespace App\Data\_7_serviceprovider;

// For Deffered Testing
class ZBar
{
    public ZFoo $zfoo;

    public function __construct(ZFoo $zfoo)
    {
        $this->zfoo = $zfoo;
    }

    public function bar(): string
    {
        return $this->foo->foo() . " and Bar";
    }
}
