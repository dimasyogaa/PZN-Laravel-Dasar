<?php

namespace Tests\Feature\_19_filter_request_input;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter FilterRequestInputTest
class FilterRequestInputTest extends TestCase
{
     public function testFilterOnly()
    {
        $this->post("/input/filter/only", [
            "namaku" => [
                "depan" => "Yoga",
                "tengah" => "Dimas",
                "akhir" => "Pambudi"
            ]
        ])->assertSeeText("Yoga")
            ->assertSeeText("Pambudi")
            ->assertDontSeeText("Dimas");
    }

    public function testFilterExcept()
    {
        $this->post("/input/filter/except", [
            "username" => "Yoga",
            "admin" => "true",
            "password" => "rahasia"
        ])->assertSeeText("Yoga")
            ->assertSeeText("rahasia")
            ->assertDontSeeText("admin");
    }

    public function testFilterMergeInput()
    {
        $this->post("/input/filter/merge", [
            "username" => "Khannedy",
            "admin" => true,
            "password" => "rahasia"
        ])->assertSeeText("Khannedy")
            ->assertSeeText("rahasia")
            ->assertSeeText("false");
    }


    public function testFilterMergeInputNoAdmin()
    {
        $this->post("/input/filter/merge", [
            "username" => "Khannedy",
            "password" => "rahasia"
        ])->assertSeeText("Khannedy")
            ->assertSeeText("rahasia")
            ->assertSeeText("false");
    }

    public function testFilterMergeInputIfMissing()
    {
        $this->post("/input/filter/mergeifmissing", [
            "username" => "Khannedy",
            "admin" => true,
            "password" => "rahasia"
        ])->assertSeeText("Khannedy")
            ->assertSeeText("rahasia")
            ->assertSeeText("true");
    }

    public function testFilterMergeInputIfMissingNoAdmin()
    {
        $this->post("/input/filter/mergeifmissing", [
            "username" => "Khannedy",
            "password" => "rahasia"
        ])->assertSeeText("Khannedy")
            ->assertSeeText("rahasia")
            ->assertSeeText("false");
    }
}
