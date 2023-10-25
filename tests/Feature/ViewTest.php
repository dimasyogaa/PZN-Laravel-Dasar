<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get("/hello")
            ->assertSeeText("Hello Yoga");

        $this->get("/hello-again")
            ->assertSeeText("Hello Dimas");
    }

    public function testNested()
    {
        $this->get("/hello-world")
            ->assertSeeText("Hello Pambudi");
    }

    public function testViewWithoutRoute()
    {
        $this->view("hello", ["name" => "yeo"])
            ->assertSeeText("Hello yeo");

        $this->view("folderhello.world", ["name" => "tri"])
            ->assertSeeText("Hello tri");
    }
}
