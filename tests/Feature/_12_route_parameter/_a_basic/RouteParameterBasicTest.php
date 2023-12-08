<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RouteParameterBasicTest
class RouteParameterBasicTest extends TestCase
{
    public function testABasicRouteParameter() {
        $this->get("/base/products/1")
        -> assertSeeText("Product 1");

        $this->get("/base/products/2")
        -> assertSeeText("Product 2");

        $this->get("/base/products/1/items/XXX")
        -> assertSeeText("Product 1, Item XXX");

        $this->get("/base/products/2/items/YYY")
        -> assertSeeText("Product 2, Item YYY");
    }
}
