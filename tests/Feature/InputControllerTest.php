<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{

    public function testInput() {

        // dikirim melalui query parameter
        $this->get("/input/hello?name=Yoga")->assertSeeText("Hello Yoga");

        // dikirim melalui body
        $this->post("/input/hello", ["name" => "Dimas"] )->assertSeeText("Hello Dimas");;
    }
   
}
