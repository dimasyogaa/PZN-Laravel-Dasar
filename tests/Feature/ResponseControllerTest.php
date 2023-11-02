<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get("/response/hello")->assertStatus(200)->assertSeeText("hello response");
    }

    public function testHeader()
    {
        $this->get("/response/header")
            ->assertStatus(200)
            ->assertSeeText("Yoga")->assertSeeText("Pambudi")
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("Author", "Codimas Production")
            ->assertHeader("App", "Belajar Laravel");
    }
}
