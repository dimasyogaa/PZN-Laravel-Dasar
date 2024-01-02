<?php

namespace Tests\Feature\_26_middleware\_e_middleware_parameter;

use Tests\TestCase;

// php artisan test --filter MiddlewareParameterTest
class MiddlewareParameterTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
        $this->get("/parameter-middleware/api")
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testMiddlewareValid()
    {
        $this->withHeader("PARAMETER-X-API-KEY", "Parameter-PZN-Codimas")
            ->get("/parameter-middleware/api")
            ->assertStatus(200)
            ->assertSeeText("Parameter Middleware");
    }
}
