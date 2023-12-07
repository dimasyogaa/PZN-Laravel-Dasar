<?php

namespace App\Data\_5_dependencyinjection\_b_bar;

use App\Data\_5_dependencyinjection\_a_foo\Foo;

class Bar
{

    // kelas Bar membutuhkan kelas Foo
    // kelas Bar bergantung pada kelas Foo
    // Tidak bisa membuat object Bar sebelum membuat object Foo
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
