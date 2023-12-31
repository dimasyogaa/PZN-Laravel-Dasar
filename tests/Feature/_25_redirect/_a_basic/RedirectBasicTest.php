<?php

namespace Tests\Feature\_25_redirect\_a_basic;

use Tests\TestCase;

// php artisan test --filter RedirectBasicTest
class RedirectBasicTest extends TestCase
{
    public function testRedirect()
    {
        $this->get("/redirect/from")
            ->assertRedirect("/redirect/to");
    }

}
