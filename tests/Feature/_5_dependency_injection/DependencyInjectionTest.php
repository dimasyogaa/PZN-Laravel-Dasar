<?php

namespace Tests\Feature;

use App\Data\_5_dependencyinjection\_b_bar\Bar;
use App\Data\_5_dependencyinjection\_a_foo\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter DependencyInjectionTest
class DependencyInjectionTest extends TestCase
{

    public function testDependencyInjection()
    {
        $foo = new Foo();

        // 3 cara dependency injection melalui :
        // 1. constructor - direkomendasikan
        $bar = new Bar($foo);

        // 2. function
        // $bar->setFoo($foo);

        // 3. attribute
        // $bar->foo = $foo;

        assertEquals("Foo and Bar", $bar->bar());
    }
}
