<?php

namespace Tests\Feature;

use App\Data\_7_serviceprovider\Bar;
use App\Data\_7_serviceprovider\Foo;
use App\Services\_7_serviceprovider\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;


 // php artisan test --filter FooBarServiceProviderTest
class FooBarServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        assertSame($foo1, $foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertSame($bar1, $bar2);

        assertSame($foo1, $bar1->foo);
        assertSame($foo2, $bar2->foo);
    }


    public function testPropertySingletons()
    {
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        assertSame($helloService1, $helloService2);

        assertEquals("Halo Yoga", $helloService1->hello("Yoga"));
    }

    public function testEmpty()
    {
        assertTrue(true);
    }
}
