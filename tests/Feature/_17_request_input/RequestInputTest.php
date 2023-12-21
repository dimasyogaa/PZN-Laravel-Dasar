<?php

namespace Tests\Feature\_17_request_input;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// php artisan test --filter RequestInputTest
class RequestInputTest extends TestCase
{

    // _a_mengambil_input
    public function testMengambilInput()
    {
        // HTTP Method - dikirim melalui query parameter
        $this->get("/requestinput?namaku=Yoga")->assertSeeText("Halo Yoga");

        // HTTP Method - dikirim melalui body
        $this->post("/requestinput", ["namaku" => "Dimas"])->assertSeeText("Halo Dimas");

        // URI/URL - dikirim melalui path
        $this->get("/requestinput/path/Yoga")->assertSeeText("Halo Yoga");
    }

    // _b_mengambil_nested_input
    public function testMengambilNestedInput()
    {
        $this->post(
            "/requestinput/nested",
            [
                "namaku" => [
                    "depan" => "Yoga"
                ]
            ]
        )->assertSeeText("Halo Yoga");
    }

    // _c_mengambil_semua_input
    public function testMengambilSemuaInput()
    {
        $this->post("/requestinput/all", [
            "name" => [
                "first" => "Yoga",
                "last" => "Dimas"
            ]
        ])
            ->assertSeeText("name")
            ->assertSeeText("first")
            ->assertSeeText("Yoga")
            ->assertSeeText("last")
            ->assertSeeText("Dimas");
    }

    // _d_mengambil_array_input : mengambilDataNamaPadaSemuaArrayProducts
    public function testMengambilArrayInput__MengambilDataNamaPadaSemuaArrayProducts()
    {
        $this->post("/requestinput/array", [
            "products" => [
                [
                    "name" => "Apple Mac Book Pro",
                    "price" => 30000000
                ],
                [
                    "name" => "Samsung Galaxy S",
                    "price" => 15000000
                ]
            ]
        ])->assertSeeText("Apple Mac Book Pro")->assertSeeText("Samsung Galaxy S");
    }

    // _e_dynamic_properties
    public function test_dapatkan_data_menggunakan_dynamic_properties()
    {
        $response = $this->post('/requestinput/dynamicproperties', [
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);

        $response->assertSeeText('First Name: John, Last Name: Doe');
    }


    public function test_dapatkan_data_menggunakan_dynamic_properties_saat_tidak_didefinisikan_dalam_permintaan()
    {
        $response = $this->post('/requestinput/dynamicproperties', [
            'last_name' => 'Doe'
        ]);

        $response->assertSeeText('First Name: kosong default, Last Name: Doe');
    }
}
