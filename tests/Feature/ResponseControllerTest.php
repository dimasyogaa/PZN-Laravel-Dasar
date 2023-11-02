<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get("/response/hello")->assertStatus(200)->assertSeeText("hello response");
    }

    public function testHeader()
    {
        $this->get("/response/header")
            ->assertStatus(200)
            ->assertSeeText("Yoga")->assertSeeText("Pambudi")
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("Author", "Codimas Production")
            ->assertHeader("App", "Belajar Laravel");
    }

    public function testView()
    {
        $this->get("/response/type/view")->assertSeeText("Hello Codimas Production");
    }

    public function testJson()
    {
        $this->get("/response/type/json")->assertJson([
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ]);
    }

    public function testFile()
    {
        $this->get("/response/type/file")->assertHeader("Content-Type", "image/png");
    }

    public function testDownload()
    {
        $this->get("/response/type/download")->assertDownload("logo yd 1080p.png");
    }
}
