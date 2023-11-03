<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testURLCurrent()
    {
        $this->get("/url/current?name=Yoga")
            ->assertSeeText("/url/current?name=Yoga");
    }

    public function testNamed()
    {
        $this->get("/url/named")
            ->assertSeeText("/redirect/name/Dimas");
    }

    public function testAction() {
        $this->get("/url/action")
        ->assertSeeText("/form");
    }
}
