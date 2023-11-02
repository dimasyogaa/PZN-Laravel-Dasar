<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddleWareTest extends TestCase
{
    public function testMiddlewareInvalid()
    {
        $this->get("/middleware1/api")
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testMiddlewareValid()
    {
        $this->withHeader("X-API-KEY", "PZN-Codimas")
            ->get("middleware1/api")
            ->assertStatus(200)
            ->assertSeeText("OK");
    }


    // GROUP
    public function testMiddlewareInvalidGroup()
    {
        $this->get("/middleware1/group")
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testMiddlewareValidGroup()
    {
        $this->withHeader("X-API-KEY", "PZN-Codimas")
            ->get("middleware1/group")
            ->assertStatus(200)
            ->assertSeeText("GROUP");
    }
}