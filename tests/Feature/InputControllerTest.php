<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{

    public function testInput()
    {

        // dikirim melalui query parameter
        $this->get("/input/hello?name=Yoga")->assertSeeText("Hello Yoga");

        // dikirim melalui body
        $this->post("/input/hello", ["name" => "Dimas"])->assertSeeText("Hello Dimas");
    }

    public function testNestedInput()
    {
        $this->post(
            "/input/hello/first",
            [
                "name" => [
                    "first" => "Yoga"
                ]
            ]
        )->assertSeeText("Hello Yoga");
    }

    public function testInputAll()
    {
        $this->post("/input/hello/all", [
            "name" => [
                "first" => "Yoga",
                "last" => "Dimas"
            ]
        ])
            ->assertSeeText("name")
            ->assertSeeText("first")
            ->assertSeeText("Yoga")
            ->assertSeeText("last")
            ->assertSeeText("Dimas");
    }

    public function testArrayInput()
    {
        $this->post("/input/hello/array", [
            "products" => [
                [
                    "name" => "Apple Mac Book Pro",
                    "price" => 30000000
                ],
                [
                    "name" => "Samsung Galaxy S",
                    "price" => 15000000
                ]
            ]
        ])->assertSeeText("Apple Mac Book Pro")->assertSeeText("Samsung Galaxy S");
    }
}
