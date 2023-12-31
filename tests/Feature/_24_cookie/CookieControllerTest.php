<?php

namespace Tests\Feature\_24_cookie;

use Tests\TestCase;


// php artisan test --filter CookieControllerTest
class CookieControllerTest extends TestCase
{
    public function testCreateCookie()
    {
        $this->get("/cookie/set")
            ->assertCookie("User-Id", "yoga")
            ->assertCookie("Is-Member", "true");
    }

    public function testGetCookie()
    {
        $this->withCookie("User-Id", "yoga")
            ->withCookie("Is-Member", "true")
            ->get("/cookie/get")
            ->assertJson([
                "userId" => "yoga",
                "isMember" => "true"
            ]);
    }
}
