<?php

namespace Tests\Feature;

use App\Services\_7_serviceprovider\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

 // php artisan test --filter SingletonesPropertiesServiceProviderTest
class SingletonesPropertiesServiceProviderTest extends TestCase
{
    public function testPropertySingletons()
    {
        $helloService1 = $this->app->make(HelloService::class);
        $helloService2 = $this->app->make(HelloService::class);

        assertSame($helloService1, $helloService2);

        assertEquals("Halo Yoga", $helloService1->hello("Yoga"));
    }

}
