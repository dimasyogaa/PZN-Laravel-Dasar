<?php

namespace Tests\Feature;

use App\Data\_6_servicecontainer\Bar;
use App\Data\_6_servicecontainer\Foo;
use App\Data\_6_servicecontainer\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;

/* Mengubah Cara Membuat Dependency
● Saat kita menggunakan function make(key), secara otomatis Laravel akan membuat object, namun
kadang kita ingin menentukan cara pembuatan objectnya
● Pada kasus seperti ini, kita bisa menggunakan method bind(key, closure)
● Kita cukup return kan data yang kita inginkan pada function closure nya
● Saat kita menggunakan make(key) untuk mengambil dependencynya, secara otomatis function
closure akan dipanggil
● Perlu diingat juga, setiap kita memanggil make(key), maka function closure akan selalu dipanggil,
jadi bukan menggunakan object yang sama

jadi kita harus memberi tahu laravel bahwa ada objek yang kompleks dalam pembuatannya dengan bind
*/

 // php artisan test --filter MengubahPembuatanDependencyTest
class MengubahPembuatanDependencyTest extends TestCase
{

    public function testCreateInstanceWithConstructorByBind()
    {

        // closure
        // hei laravel, jika ada yang ingin membuat objek Person maka caranya seperti ini
        $this->app->bind(Person::class, function () {
            return new Person("Yoga", "Dimas");
        });

        // membuat person, sehingga cara pembuatannya mengikuti kode bind diatas
        $person1 = $this->app->make(Person::class); // closure() // new Person("Yoga", "Dimas")
        $person2 = $this->app->make(Person::class); // closure() // new Person("Yoga", "Dimas")

        assertEquals("Yoga", $person1->firstName);
        assertEquals("Yoga", $person2->firstName);
        assertNotSame($person1, $person2); // objek berbeda
    }

    public function testCreateDependecyInjection()
    {
       

        // 1. memberi tahu laravel bagaimana object Bar itu dibuat
        $this->app->bind("Kunci Untuk Membuat Object Bar", function () {
            // 2. yaitu dengan membutuhkan object Foo
            return new Bar($this->app->make(Foo::class));
        });

        // 3. membuat object Bar dengan cara pembuatan yang sudah ditunjukkan diatas
        $bar = $this->app->make("Kunci Untuk Membuat Object Bar");
        
        assertEquals("Foo and Bar", $bar->bar());
    }

}
