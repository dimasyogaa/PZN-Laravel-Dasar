<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter FacadeTest
class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName1 = config("_8_facades.author.first");

        // facades
        $firstName2 = Config::get("_8_facades.author.first");

        assertEquals($firstName1, $firstName2);

        // var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $firstName1 = config("_8_facades.author.first");


        // facades
        $firstName2 = Config::get("_8_facades.author.first");

        assertEquals($firstName1, $firstName2);

        // var_dump(Config::all());

        // sama seperti
        $config = $this->app->make("config");
        $firstName3 =  $config->get("_8_facades.author.first");

        assertEquals($firstName2, $firstName3);
        // var_dump($config->all());
    }

    public function testFacadeMock()
    {
        Config::shouldReceive("get")
            ->with("_8_facades.author.first")
            ->andReturn("Yoga Keren");

        $firstName = Config::get("_8_facades.author.first");

        assertEquals("Yoga Keren", $firstName);
    }
}
