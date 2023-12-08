<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter NamedRouteTest
class NamedRouteTest extends TestCase
{
    public function testNamed() {
        $this->get("/named-route/produk/12345")->assertSeeText('Link http://localhost/products/12345');
        $this->get("/named-route/produk/12345")->assertSeeText('products/12345');
        
        $this->get("/named-route/produk-redirect/12345")->assertRedirect('products/12345');
    }
}
