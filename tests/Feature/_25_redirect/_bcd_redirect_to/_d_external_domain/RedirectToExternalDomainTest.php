<?php

namespace Tests\Feature\_25_redirect\_bcd_redirect_to\_d_external_domain;

use Tests\TestCase;

// php artisan test --filter RedirectToExternalDomainTest
class RedirectToExternalDomainTest extends TestCase
{
    public function testRedirectAway()
    {
        $this->get('/redirect/externaldomain')
            ->assertRedirect('https://github.com/Yogadimas');
    }
}
