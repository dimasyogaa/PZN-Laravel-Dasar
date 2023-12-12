<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RequestTest
class RequestTest extends TestCase
{
    public function testRequest()
    {
        $this->get("/request", [
            "Accept" => "plain/text"
        ])->assertSeeText("request")
            ->assertSeeText("http://localhost/request")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text")
            ->assertSeeText("kosong");
    }

    public function testRequestWithParameter()
    {
        $this->get("/request/param/yoga", [
            "Accept" => "plain/text"
        ])->assertSeeText("request/param")
            ->assertSeeText("http://localhost/request/param/yoga")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text")
            ->assertSeeText("yoga");
    }

    public function testRequestWithQueryParameter()
    {
        $this->get("/request/param/yoga?param=1", [
            "Accept" => "plain/text"
        ])->assertSeeText("request/param") // path
            ->assertSeeText("http://localhost/request/param/yoga") // url
            ->assertSeeText("http://localhost/request/param/yoga?param=1") // full url
            ->assertSeeText("GET") // method
            ->assertSeeText("plain/text") // header
            ->assertSeeText("yoga"); // name
    }
}
