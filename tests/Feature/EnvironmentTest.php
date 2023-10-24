<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $youtube = env("YOUTUBE");

        assertEquals("Yoga Dimas", $youtube);
    }

    public function testDefaultEnv()
    {
        // $author = env("AUTHOR", "Yoga");
        $author = Env::get("AUTHOR", "Yoga");

        assertEquals("Yoga", $author);
    }
}
