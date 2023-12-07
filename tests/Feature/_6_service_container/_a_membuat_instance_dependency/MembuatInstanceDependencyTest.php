<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Bar;
use App\Data\_6_servicecontainer\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;

/* Membuat Dependency
● Dengan menggunakan Service Container, kita tidak perlu membuat object secara manual lagi
menggunakan kata kunci new
● Kita bisa menggunakan function make(key) yang terdapat di class Application untuk membuat
dependency secara otomatis
● Saat kita menggunakan make(key), object akan selalu dibuat baru, jadi harap hati-hati ketika
menggunakannya, karena dia bukan menggunakan object yang sama
 */

 // php artisan test --filter MembuatInstanceDependencyTest
class MembuatInstanceDependencyTest extends TestCase
{
    public function testCreateInstance()
    {
        // $foo = new Foo();
        $foo1 = $this->app->make(Foo::class); // new Foo()
        $foo2 = $this->app->make(Foo::class); // new Foo()
        
        assertEquals("Foo", $foo1->foo());
        assertEquals("Foo", $foo2->foo());
        assertNotSame($foo1,  $foo2);

    }

    public function testCreateDependecyInjection()
    {
        $bar = new Bar($this->app->make(Foo::class));
        
        assertEquals("Foo and Bar", $bar->bar());
    }
}
