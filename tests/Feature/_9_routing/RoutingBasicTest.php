<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RoutingBasicTest
class RoutingBasicTest extends TestCase
{
    public function testBasicRouting_1()
    {
        $this->get('/ydp')
            ->assertStatus(200)
            ->assertSeeText("Hello Yoga Dimas Pambudi");
    }

    public function testRedirect_2() {
        $this->get("/me")
        ->assertRedirect("/ydp");
    }

    public function testFallback_4() {
        $this->get("/tidakada")
        ->assertSeeText("404 by Yoga Dimas Pambudi");

        $this->get("/ups")
        ->assertSeeText("404 by Yoga Dimas Pambudi");
    }

}
