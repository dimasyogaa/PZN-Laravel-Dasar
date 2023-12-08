<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RouteParameterRegexTest
class RouteParameterRegexTest extends TestCase
{
    public function testBRouteParameterRegex() {
        $this->get("base/categories/12345") -> assertSeeText("Categories : 12345");

        // jika tidak sesuai tipe parameter yang dimasukan maka akan diarahkan ke route fallback
        $this->get("base/categories/salah") -> assertSeeText("404 by Yoga Dimas Pambudi");
    }
}
