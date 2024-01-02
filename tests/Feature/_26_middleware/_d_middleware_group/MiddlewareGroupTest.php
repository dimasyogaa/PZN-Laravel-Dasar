<?php

namespace Tests\Feature\_26_middleware\_d_middleware_group;

use Tests\TestCase;

// php artisan test --filter MiddlewareGroupTest
class MiddlewareGroupTest extends TestCase
{
    public function testMiddlewareInvalidGroup()
    {
        $this->get("/group-middleware")
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testMiddlewareValidGroup()
    {
        $this->withHeaders([
            "A-X-API-KEY" => "A-PZN-Codimas",
            "B-X-API-KEY" => "B-PZN-Codimas",
            "C-X-API-KEY" => "C-PZN-Codimas",
        ])
            ->get("/group-middleware")
            ->assertStatus(200)
            ->assertSeeText("Group Middleware");
    }
}
