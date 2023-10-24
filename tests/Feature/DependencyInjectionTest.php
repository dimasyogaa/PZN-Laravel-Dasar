<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class DependencyInjectionTest extends TestCase
{

    public function testDependencyInjection()
    {
        $foo = new Foo();

        // dependency injection melalui :
        // 1. constructor
        $bar = new Bar($foo);

        // 2. function
        // $bar->setFoo($foo);

        // 3. attribute
        // $bar->foo = $foo;

        assertEquals("Foo and Bar", $bar->bar());
    }
}
