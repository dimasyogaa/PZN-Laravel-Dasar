<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config("contoh.author.first");

        // facades
        $firstName2 = Config::get("contoh.author.first");

        assertEquals($firstName1, $firstName2);

        // var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $firstName1 = config("contoh.author.first");


        // facades
        $firstName2 = Config::get("contoh.author.first");

        assertEquals($firstName1, $firstName2);

        // var_dump(Config::all());

        // sama seperti
        $config = $this->app->make("config");
        $firstName3 =  $config->get("contoh.author.first");

        assertEquals($firstName2, $firstName3);
        // var_dump($config->all());
    }

    public function testFacadeMock()
    {
        Config::shouldReceive("get")
            ->with("contoh.author.first")
            ->andReturn("Yoga Keren");

        $firstName = Config::get("contoh.author.first");

        assertEquals("Yoga Keren", $firstName);
    }
}
