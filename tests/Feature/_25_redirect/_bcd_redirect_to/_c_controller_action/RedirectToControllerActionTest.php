<?php

namespace Tests\Feature\_25_redirect\_bcd_redirect_to\_c_controller_action;

use Tests\TestCase;

// php artisan test --filter RedirectToControllerActionTest
class RedirectToControllerActionTest extends TestCase
{
    public function testRedirectAction()
    {
        $this->get('/redirect/controlleraction')
            ->assertRedirect('/redirect/controlleraction/Dimas');
    }
}
