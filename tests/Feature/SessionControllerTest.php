<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get("/session/create")
            ->assertSeeText("OK")
            ->assertSessionHas("userId", "dimas")
            ->assertSessionHas("isMember", "true");
    }

    public function testGetSession()
    {
        $this->withSession([
            "userId" => "Dimas",
            "isMember" => true
        ])->get("/session/get")
            ->assertSeeText("Dimas")->assertSeeText(true);
    }

    public function testGetSessionDefault()
    {
        $this->withSession([])->get("/session/get")
            ->assertSeeText("guest")->assertSeeText(false);
    }
}
