<?php

namespace Tests\Feature\_25_redirect\_bcd_redirect_to\_b_named_route;

use Tests\TestCase;

// php artisan test --filter RedirectToNamedRouteTest
class RedirectToNamedRouteTest extends TestCase
{
    public function testRedirectName()
    {
        $this->get('/redirect/namedroute')
            ->assertRedirect('/redirect/namedroute/Yoga');
    }
}
