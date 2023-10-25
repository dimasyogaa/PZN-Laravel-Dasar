<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
        $this->get('/ydp')
            ->assertStatus(200)
            ->assertSeeText("Hello Yoga Dimas Pambudi");
    }

    public function testRedirect() {
        $this->get("/me")
        ->assertRedirect("/ydp");
    }

    public function testFallback() {
        $this->get("/tidakada")
        ->assertSeeText("404 by Yoga Dimas Pambudi");

        $this->get("/ups")
        ->assertSeeText("404 by Yoga Dimas Pambudi");
    }
}
