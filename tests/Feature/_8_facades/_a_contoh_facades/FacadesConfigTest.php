<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter FacadesConfigTest
class FacadesConfigTest extends TestCase
{
    public function testConfigWithHelperFunction()
    {
        $firstName = config("_8_facades.contoh.author.first");
        $lastName = config("_8_facades.contoh.author.last");
        $email = config("_8_facades.contoh.email");
        $web = config("_8_facades.contoh.web");

        assertEquals("Yoga", $firstName);
        assertEquals("Dimas", $lastName);
        assertEquals("yogadimaspambudi@gmail.com", $email);
        assertEquals("https://github.com/Yogadimas", $web);
    }

    public function testConfigWithFacades()
    {
        $firstNameHelperFunction = config("_8_facades.contoh.author.first");
        $firstNameFacades = Config::get("_8_facades.contoh.author.first");

        $lastName = Config::get("_8_facades.contoh.author.last");
        $email = Config::get("_8_facades.contoh.email");
        $web = Config::get("_8_facades.contoh.web");

        assertEquals($firstNameHelperFunction, $firstNameFacades);

        assertEquals("Yoga", $firstNameFacades);
        assertEquals("Dimas", $lastName);
        assertEquals("yogadimaspambudi@gmail.com", $email);
        assertEquals("https://github.com/Yogadimas", $web);

         // melihat semua config
        //  var_dump(Config::all());

    }
}
