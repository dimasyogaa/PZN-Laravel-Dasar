<?php

namespace App\Data\_6_servicecontainer;


class Bar
{
    public Foo $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function bar(): string
    {
        return $this->foo->foo() . " and Bar";
    }
}
