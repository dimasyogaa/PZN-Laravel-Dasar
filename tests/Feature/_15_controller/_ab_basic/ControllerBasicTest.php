<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter ControllerBasicTest
class ControllerBasicTest extends TestCase
{
    public function testBasicController()
    {
        $this->get('/controller/ab-basic')
            ->assertSeeText("ABBasicHelloController : hello word from function basicHello()");
    }
}
