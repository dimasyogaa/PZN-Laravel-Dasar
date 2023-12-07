<?php

namespace Tests\Feature;

use App\Services\_6_servicecontainer\HelloService;
use App\Services\_6_servicecontainer\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

/* Binding Interface ke Class
● Dalam praktek pengembangan perangkat lunak, hal yang bagus ketika membuat sebuah class yang
berhubungan dengan logic adalah, membuat interface sebagai kontrak nya. Harapannya agar
implementasi classnya bisa berbeda-beda tanpa harus mengubah kontrak interface nya
● Laravel memiliki fitur melakukan binding dari interface ke class secara mudah, 
kita bisa menggunakan 4 cara antara lain :
1. bind(interface, class) 
2. bind(interface, closure) 
3. singleton(interface, class) 
4. singleton(interface, closure)

note : closure nya mengembalikan object class implementasinya
*/

 // php artisan test --filter BindingInterfaceKeClassTest
class BindingInterfaceKeClassTest extends TestCase
{
    public function testInterfaceToClass()
    {
        // singleton(interface, class)
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // singleton(interface, closure)
        $this->app->singleton(HelloService::class, function () {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        assertEquals("Halo Yoga", $helloService->hello("Yoga"));
    }
}
