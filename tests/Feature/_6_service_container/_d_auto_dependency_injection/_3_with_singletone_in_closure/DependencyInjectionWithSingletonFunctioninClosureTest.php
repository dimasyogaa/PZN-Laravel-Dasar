<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Bar;
use App\Data\_6_servicecontainer\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

/* Dependency Injection di Closure
● Dalam function closure yang kita gunakan, kita juga bisa menggunakan parameter $app untuk
mengambil object yang sudah ada di Service Container
● Kadang ini mempermudah ketika kita ingin membuat object yang kompleks
*/

  // php artisan test --filter DependencyInjectionWithSingletonFunctioninClosureTest
class DependencyInjectionWithSingletonFunctioninClosureTest extends TestCase
{
    public function testDependencyInjectionFooBarSingletoneClosure()
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });

        // singleton pada Bar
        $this->app->singleton(Bar::class, function ($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertSame($foo, $bar1->foo); 
        assertSame($bar1, $bar2); // sama karena ketika kita membuat object bar dengan cara pembuatan singleton

        // bar1 dan bar2 merupakan objek yang sama
    }

}
