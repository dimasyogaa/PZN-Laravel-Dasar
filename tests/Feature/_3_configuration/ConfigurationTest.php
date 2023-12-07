<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

// php artisan test --filter ConfigurationTest
class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config("_3_configuration.contoh.author.first");
        $lastName = config("_3_configuration.contoh.author.last");
        $email = config("_3_configuration.contoh.email");
        $web = config("_3_configuration.contoh.web");

        assertEquals("Yoga", $firstName);
        assertEquals("Dimas", $lastName);
        assertEquals("yogadimaspambudi@gmail.com", $email);
        assertEquals("https://github.com/Yogadimas", $web);
    }
}
