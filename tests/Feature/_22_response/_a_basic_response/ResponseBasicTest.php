<?php

namespace Tests\Feature\_22_response\_a_basic_response;

use Tests\TestCase;

// php artisan test --filter ResponseBasicTest
class ResponseBasicTest extends TestCase
{
    public function testResponse()
    {
        $this->get("/response/basic")->assertStatus(200)->assertSeeText("basic response");
    }
}
