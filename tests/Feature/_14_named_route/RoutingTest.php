<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RoutingTest
class RoutingTest extends TestCase
{
    public function testRouteParameter() {
        $this->get("/products/1")
        -> assertSeeText("Product 1");

        $this->get("/products/2")
        -> assertSeeText("Product 2");

        $this->get("/products/1/items/XXX")
        -> assertSeeText("Product 1, Item XXX");

        $this->get("/products/2/items/YYY")
        -> assertSeeText("Product 2, Item YYY");
    }

    public function testRouteParameterRegex() {
        $this->get("/categories/12345") -> assertSeeText("Categories : 12345");
        $this->get("/categories/salah") -> assertSeeText("404 by Yoga Dimas Pambudi");
    }

    public function testRouteOptionalParameter() {
        $this->get("/users/12345")->assertSeeText('Users : 12345');
        $this->get("/users/")->assertSeeText('Users : 404 by Yoga Dimas Pambudi');
    }

    public function testRouteConflict() {
        $this->get("/conflict/yeo")->assertSeeText('Conflict yeo');
        $this->get("/conflict/yoga")->assertSeeText('Conflict Yoga Dimas Pambudi');
    }

    public function testNamed() {
        $this->get("/produk/12345")->assertSeeText('products/12345');
        $this->get("/produk-redirect/12345")->assertRedirect('products/12345');
    }
}
