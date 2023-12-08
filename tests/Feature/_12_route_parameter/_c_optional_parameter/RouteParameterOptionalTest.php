<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RouteParameterOptionalTest
class RouteParameterOptionalTest extends TestCase
{
    public function testCRouteOptionalParameter() {
        $this->get("/base/users/12345")->assertSeeText('Users : 12345');

        // parameter tidak diiisi,sehingga mengambil nilai defaultnya
        $this->get("/base/users/")->assertSeeText('Users : ID Default 42443 - 404 by Yoga Dimas Pambudi');
    }
}
