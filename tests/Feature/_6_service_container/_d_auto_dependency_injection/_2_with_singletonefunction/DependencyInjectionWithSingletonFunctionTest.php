<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Bar;
use App\Data\_6_servicecontainer\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

/*
Tapi kita tidak mau laravel membuat object baru ketika proses inject secara otomatis
maka kita bisa menggunakan singleton, sehingga laravel tidak membuat object baru ketika proses inject
*/

  // php artisan test --filter DependencyInjectionWithSingletonFunctionTest
class DependencyInjectionWithSingletonFunctionTest extends TestCase
{
       public function testDependencyInjectionFooBarSingletone()
    {
        $this->app->singleton(Foo::class, function () {
            return new Foo();
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);


        assertSame($foo, $bar->foo); // sama karena foo yang diinject oleh laravel itu objek yang sama
        assertNotSame($bar1, $bar2);

        // bar1 dan bar2 merupakan objek yang berbeda
    }
}
