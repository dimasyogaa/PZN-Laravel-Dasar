<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter ViewTest
class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get("//view-view-hello")
            ->assertSeeText("Hello Yoga");

        $this->get("//view-get-hello")
            ->assertSeeText("Hello Dimas");
    }

    public function testNested()
    {
        $this->get("/view-get-nested-hello")
            ->assertSeeText("Hello Pambudi");
    }

   
}
