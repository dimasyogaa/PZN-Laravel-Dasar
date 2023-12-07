<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

/* Instance
● Selain menggunakan function singleton(key, closure), untuk membuat singleton object, kita juga
bisa menggunakan object yang sudah ada, dengan cara menggunakan function instance(key, object)
● Ketika menggunakan make(key), maka instance object tersebut akan dikembalikan
 */

  // php artisan test --filter InstanceSingletoneTest
class InstanceSingletoneTest extends TestCase
{
    public function testInstance()
    {

        // sama seperti singleton
        $person = new Person("Yoga", "Dimas");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // $person
        $person2 = $this->app->make(Person::class); // $person

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertSame($person1, $person2);
    }
}
