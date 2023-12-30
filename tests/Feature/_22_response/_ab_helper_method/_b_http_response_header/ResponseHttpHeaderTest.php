<?php

namespace Tests\Feature\_22_response\_ab_helper_method\_b_http_response_header;

use Tests\TestCase;

// php artisan test --filter ResponseHttpHeaderTest
class ResponseHttpHeaderTest extends TestCase
{
    public function testHeader()
    {
        $this->get("/response/header")
            ->assertStatus(200)
            ->assertSeeText("Yoga")->assertSeeText("Pambudi")
            ->assertHeader("Content-Type", "application/json")
            ->assertHeader("Author", "Codimas Production")
            ->assertHeader("App", "Belajar Laravel");
    }
}
