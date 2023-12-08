<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/* Test View Tanpa Routing
● Kadang kita juga ingin membuat View tanpa routing, misal untuk mengirim email misalnya
● Pada kasus ini, kita bisa melakukan test view secara langsung, tanpa harus membuat Route terlebih
dahulu
*/

// php artisan test --filter ViewTestWithoutRoutingTest
class ViewTestWithoutRoutingTest extends TestCase
{
    public function testViewWithoutRoute()
    {
        $this->view("_10_view.hello", ["name" => "Afrizal"])
            ->assertSeeText("Hello Afrizal");

        $this->view("_10_view._e_nested_view_directory.world", ["name" => "Harka"])
            ->assertSeeText("Hello Harka");
    }
}
