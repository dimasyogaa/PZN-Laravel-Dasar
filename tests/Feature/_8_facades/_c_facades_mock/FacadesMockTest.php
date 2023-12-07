<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter FacadesMockTest
class FacadesMockTest extends TestCase
{
    public function testFacadeMock()
    {

        // memberi perilaku pada object tiruan Config
        // jika ada yang memanggil method get 
        // dengan parameter ("Hai Yoga"), 
        // maka kembalikan nilai Yoga Keren
        Config::shouldReceive("get")
            ->with("hai.yoga")
            ->andReturn("Yoga Keren");

        // memanggil method get dengan parameter ("hai.yoga")
        // artinya, ini tidak mengambil nilai dari file Config bawaan laravel, tapi dari object tiruan diatas
        $firstName = Config::get("hai.yoga"); 

        assertEquals("Yoga Keren", $firstName); // hasilnya harus sama dengan apa yang kita harapkan
    }
}
