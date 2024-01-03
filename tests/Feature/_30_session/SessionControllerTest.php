<?php

namespace Tests\Feature\_30_session;

use Tests\TestCase;

// php artisan test --filter SessionControllerTest
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

    public function testGetSessionUnitTesting()
    {
        // tidak perlu membuat session di controller, langsung membuat session diunit test dengan withSession
        $this->withSession([
            "idPengguna" => "Pambudi",
            "anggota" => true
        ])->get("test/session/get")
            ->assertSeeText("Pambudi")->assertSeeText(true);
    }

    public function testGetSessionDefault()
    {
        $this->withSession([])->get("/session/get")
            ->assertSeeText("guest")->assertSeeText(false);
    }
}
