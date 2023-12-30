<?php

namespace Tests\Feature\_22_response\_ab_helper_method\_c_response_type;

use Tests\TestCase;

// php artisan test --filter ResponseTypeTest
class ResponseTypeTest extends TestCase
{
    public function testView()
    {
        $this->get("/response/type/view")->assertSeeText("Hello ResponseTypeController : View");
    }

    public function testJson()
    {
        $this->get("/response/type/json")->assertJson([
            "firstName" => "Yoga",
            "lastName" => "Pambudi"
        ]);
    }

    public function testFile()
    {
        $this->get("/response/type/file")->assertHeader("Content-Type", "image/png");
    }

    public function testDownload()
    {
        $this->get("/response/type/download")->assertDownload("logo yd 1080p.png");
    }
}
