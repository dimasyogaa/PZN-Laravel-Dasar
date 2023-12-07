<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter FacadesConfigDependencyTest
class FacadesConfigDependencyTest extends TestCase
{
    public function testConfigDependency()
    {
        $firstNameHelperFunction = config("_8_facades.author.first");
        $firstNameFacades = Config::get("_8_facades.author.first");

        assertEquals($firstNameHelperFunction, $firstNameFacades);

        // var_dump(Config::all());

       /*
        $firstNameFacades = Config::get("_8_facades.author.first");
        facades $firstNameFacades jika dikodekan dalam bentuk dependency injection maka sama seperti kode $firstName3  di bawah
        key "config" itu sama dengan nilai yang dikembalikan oleh fungsi getFacadeAccessor() pada Facades COnfig
         protected static function getFacadeAccessor()
        {
            return 'config';
        }
       */
        $config = $this->app->make("config");

        // ketika manggil get pada facades itu sama seperti ini
        $firstName3 =  $config->get("_8_facades.author.first");

        assertEquals($firstNameFacades, $firstName3);

        // var_dump($config->all());


    }
}
