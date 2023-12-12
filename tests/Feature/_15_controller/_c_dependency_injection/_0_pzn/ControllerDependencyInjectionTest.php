<?php

namespace Tests\Feature;

use App\Http\Controllers\_15_controller\CDISingletonHelloController;
use App\Services\_15_controller\singletone\ServiceClass;
use App\Services\_15_controller\singletone\ServiceInterface;
use App\Services\_15_controller\nosingletone\ServiceInterface as ServiceInterfaceNoSingletone;
use App\Services\_15_controller\nosingletone\ServiceClass as ServiceClassNoSingletone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Mockery;
use Tests\TestCase;



// php artisan test --filter ControllerDependencyInjectionTest
class ControllerDependencyInjectionTest extends TestCase
{

    public function testNoSingletonBehavior()
    {
        // Memanggil rute untuk Controller pertama
        $response1 = $this->get('/controller/c-di/John');
        $response1->assertStatus(200);

        // Memanggil rute untuk Controller kedua
        $response2 = $this->get('/controller/c-di/Jane');
        $response2->assertStatus(200);

        // Memeriksa apakah instance ServiceInterface adalah singleton = Tidak singleton
        app()->bind(ServiceInterfaceNoSingletone::class, ServiceClassNoSingletone::class) ;

        // berbeda
        $this->assertNotSame(
            app()->make(ServiceInterfaceNoSingletone::class),
            app()->make(ServiceInterfaceNoSingletone::class)
        );

        // Melakukan verifikasi nilai kembalian dari fungsi woi()
        $response1->assertSeeText('Woi oi oi John');
        $response2->assertSeeText('Woi oi oi Jane');
    }

    public function testSingletonBehavior()
    {
        // Memanggil rute untuk Controller pertama
        $response1 = $this->get('/controller/c-di-singletone/John');
        $response1->assertStatus(200);

        // Memanggil rute untuk Controller kedua
        $response2 = $this->get('/controller/c-di-singletone/Jane');
        $response2->assertStatus(200);

        // Memeriksa apakah instance ServiceInterface adalah singleton = Iya Singletone
        $this->assertSame(
            app()->make(ServiceInterface::class),
            app()->make(ServiceInterface::class)
        );

        // Melakukan verifikasi nilai kembalian dari fungsi woi()
        $response1->assertSeeText('Woi oi oi John');
        $response2->assertSeeText('Woi oi oi Jane');
    }

    public function testSingletonBehavior2()
    {
        // Membuat mock objek untuk ServiceInterface
        $mockService = Mockery::mock(ServiceInterface::class);
        $mockService->shouldReceive('woi')->twice()->andReturn('Woi oi oi Mock');

        // Memasukkan mock objek ke dalam aplikasi sebagai singleton
        $this->app->instance(ServiceInterface::class, $mockService);

        // Memanggil rute untuk Controller pertama
        $response1 = $this->get('/controller/c-di-singletone/John');
        $response1->assertStatus(200);

        // Memanggil rute untuk Controller kedua
        $response2 = $this->get('/controller/c-di-singletone/Jane');
        $response2->assertStatus(200);

        // Melakukan verifikasi nilai kembalian dari fungsi woi()
        $response1->assertSeeText('Woi oi oi Mock');
        $response2->assertSeeText('Woi oi oi Mock');

        Mockery::close();
    }

    public function testSingletonBehaviorWithCounter()
    {
        // Membuat instance ServiceClass
        $serviceInstance = new ServiceClass();

        // Memanggil rute untuk Controller pertama
        $response1 = $this->get('/controller/c-di-singletone/John');
        $response1->assertStatus(200);

        // Memeriksa bahwa fungsi woi dipanggil pada instance yang sama
        $this->assertSame('Woi oi oi John - 1', $serviceInstance->woi('John'));

        // Memanggil rute untuk Controller kedua
        $response2 = $this->get('/controller/c-di-singletone/Jane');
        $response2->assertStatus(200);

        // Memeriksa bahwa fungsi woi dipanggil pada instance yang sama
        $this->assertSame('Woi oi oi Jane - 2', $serviceInstance->woi('Jane'));
    }

    public function testSingletonBehaviorWithCounterAndMockery()
    {
        // Membuat mock objek untuk ServiceClass
        $mockService = Mockery::mock(ServiceInterface::class);
        $mockService->shouldReceive('woi')->twice()->andReturnUsing(function ($name) {
            return "Woi oi oi $name - " . $this->counter++;
        });

        // Memasukkan mock objek ke dalam aplikasi sebagai singleton
        $this->app->instance(ServiceInterface::class, $mockService);

        // Memanggil rute untuk Controller pertama
        $response1 = $this->get('/controller/c-di-singletone/John');


        // Memanggil rute untuk Controller kedua
        $response2 = $this->get('/controller/c-di-singletone/Jane');


        // Melakukan verifikasi jumlah panggilan fungsi woi() pada mock objek
        $mockService->shouldHaveReceived('woi')->twice();

        // Melakukan verifikasi nilai kembalian dari fungsi woi()
        $response1->assertSeeText('Woi oi oi John - 0');
        $response2->assertSeeText('Woi oi oi Jane - 1');

        Mockery::close();
    }
}
