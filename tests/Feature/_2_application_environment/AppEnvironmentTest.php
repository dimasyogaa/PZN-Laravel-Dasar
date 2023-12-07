<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

// php artisan test --filter AppEnvironmentTest
class AppEnvironmentTest extends TestCase
{
    public function testAppEnv()
    {
        // var_dump(App::environment()); // testing bukan local, karena ditimpa oleh APP_ENV di phpunit.xml

        if (App::Environment("testing")) {
            assertTrue(true);
        }

        if (App::Environment(["testing", "prod", "dev"])) {
            assertTrue(true);
        }
    }
}
