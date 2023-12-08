<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RouteParameterConflictTest
class RouteParameterConflictTest extends TestCase
{
    public function testDRouteConflict() {
        $this->get("/conflict/yeo")->assertSeeText('Conflict yeo');
        $this->get("/conflict/yoga")->assertSeeText('Conflict Yoga Dimas Pambudi');
    }
}
