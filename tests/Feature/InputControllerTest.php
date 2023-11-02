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

    public function testinputType()
    {
        $this->post("/input/type", [
            "name" => "Dimas",
            "married" => "false",
            "birth_date" => "1990-10-10"
        ])
            ->assertSeeText("Dimas")
            ->assertSeeText("false")
            ->assertSeeText("1990-10-10");
    }

    public function testFilterOnly()
    {
        $this->post("/input/filter/only", [
            "name" => [
                "first" => "Yoga",
                "middle" => "Dimas",
                "last" => "Pambudi"
            ]
        ])->assertSeeText("Yoga")
            ->assertSeeText("Pambudi")
            ->assertDontSeeText("Dimas");
    }

    public function testFilterExcept()
    {
        $this->post("/input/filter/except", [
            "username" => "Yoga",
            "admin" => "true",
            "password" => "rahasia"
        ])->assertSeeText("Yoga")
            ->assertSeeText("rahasia")
            ->assertDontSeeText("admin");
    }

    public function testFilterMergeInput()
    {
        $this->post("/input/filter/merge", [
            "username" => "Khannedy",
            "admin" => "true",
            "password" => "rahasia"
        ])->assertSeeText("Khannedy")
            ->assertSeeText("rahasia")
            ->assertSeeText("false");
    }
}
