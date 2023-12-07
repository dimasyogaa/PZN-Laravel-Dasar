<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

/* Singleton
● Sebelumnya ketika menggunakan make(key), maka secara default Laravel akan membuat object
baru, atau jika menggunakan bind(key, closure), function closure akan selalu dipanggil
● Kadang ada kebutuhan kita membuat object singleton, yaitu satu object saja, dan ketika butuh, kita
cukup menggunakan object yang sama
● Pada kasus ini, kita bisa menggunakan function singleton(key, closure), maka secara otomatis
ketika kita menggunakan make(key), maka object hanya dibuat di awal, selanjutnya object yang
sama akan digunakan terus menerus ketika kita memanggil make(key)
*/

 // php artisan test --filter SingletoneFunctionTest
class SingletoneFunctionTest extends TestCase
{
    public function testSingleton()
    {

        $this->app->singleton(Person::class, function () {
            return new Person("Yoga", "Dimas");
        });

        $person1 = $this->app->make(Person::class); // new Person("Yoga", "Dimas"); ifnot exists
        $person2 = $this->app->make(Person::class); // return existing

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertSame($person1, $person2); // objek sama
    }
}
