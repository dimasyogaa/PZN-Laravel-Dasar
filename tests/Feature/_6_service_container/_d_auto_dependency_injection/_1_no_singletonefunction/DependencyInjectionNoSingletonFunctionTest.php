<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Bar;
use App\Data\_6_servicecontainer\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;

/* Dependency Injection
● Sekarang kita tahu bagaimana cara membuat dependency dan juga mendapatkan dependency di
Laravel, sekarang bagaimana caranya melakukan dependency injection?
● Secara default, jika kita membuat object menggunakan make(key), lalu Laravel mendeteksi
terdapat constructor, maka Laravel akan mencoba menggunakan dependency yang sesuai dengan
tipe yang dibutuhkan di Laravel

intinya : 
laravel akan mendeteksi object(x) yang membutuhkan object lain(y),
laravel secara otomatis akan menginject object y ke object x

// laravel secara otomatis membuat object Foo baru lalu menginjectkan ke constructor Bar di bawah ini
 public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }
 */

  // php artisan test --filter DependencyInjectionNoSingletonFunctionTest
class DependencyInjectionNoSingletonFunctionTest extends TestCase
{
     public function testDependencyInjectionFooBar()
    {
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertEquals("Foo and Bar", $bar->bar());
        assertNotSame($foo, $bar->foo); // beda karena foo yang diinject oleh laravel itu objek baru
        assertNotSame($bar, $bar2); 
    }


}
