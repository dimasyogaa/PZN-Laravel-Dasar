<?php

namespace Tests\Feature\_26_middleware\_c_registrasi_middleware\_c2_route_middleware;

use Tests\TestCase;

// php artisan test --filter MiddlewareRouteTest
class MiddlewareRouteTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
        $this->get("/route-middleware/api")
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testMiddlewareValid()
    {
        $this->withHeader("Route-X-API-KEY", "RouteMiddleware-PZN-Codimas")
            ->get("/route-middleware/api")
            ->assertStatus(200)
            ->assertSeeText("Route Middleware");
    }
}
