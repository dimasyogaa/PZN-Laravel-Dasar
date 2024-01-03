<?php

namespace Tests\Feature\_29_url_generation;

use Tests\TestCase;


// php artisan test --filter URLGenerationTest
class URLGenerationTest extends TestCase
{
    public function testCurrentURL()
    {
        $this->get("/url/current?name=Yoga")
            ->assertSeeText("/url/current?name=Yoga");
    }

    public function testNamedRoutes()
    {
        $this->get("/url/named")
            ->assertSeeText("/redirect/namedroute/Dimas");
    }

    public function testControllerAction() {
        $this->get("/url/action")
        ->assertSeeText("/url/controller-action/csrf");
    }
}
