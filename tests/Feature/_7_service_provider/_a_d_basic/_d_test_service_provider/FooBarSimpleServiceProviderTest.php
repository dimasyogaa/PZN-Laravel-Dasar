<?php

namespace Tests\Feature;

use App\Data\_7_serviceprovider\Bar;
use App\Data\_7_serviceprovider\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertSame;

 // php artisan test --filter FooBarSimpleServiceProviderTest
class FooBarSimpleServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        assertSame($foo1, $foo2); // harus sama karena semua objeknya dibuat singletone di service provider

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertSame($bar1, $bar2);

        assertSame($foo1, $bar1->foo);
        assertSame($foo2, $bar2->foo);
    }

}
