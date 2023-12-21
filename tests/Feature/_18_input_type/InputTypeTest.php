<?php

namespace Tests\Feature\_18_input_type;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter InputTypeTest
class InputTypeTest extends TestCase
{
    public function testinputType()
    {
        $this->post("/inputtype", [
            "name" => "Dimas",
            "married" => "false",
            "birth_date" => "2000-10-10"
        ])
            ->assertSeeText("Dimas")
            ->assertSeeText(false)
            ->assertSeeText("2000-10-10");
    }
}
