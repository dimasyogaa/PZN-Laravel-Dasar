<?php

namespace App\Http\Controllers\_15_controller\_abcd_pzn;

use App\Http\Controllers\Controller;
use App\Services\_15_controller\nosingletone\ServiceClass;
use Illuminate\Http\Request;

/* kita bisa menambahkan dependency yang dibutuhkan di Constructor
Controller, dan secara otomatis Laravel akan mengambil dependency tersebut dari Service Container */

class CDIHelloController extends Controller
{
    // jika ini dihapus maka tidak terjadi apa apa
    // karena ini hanya sebagai unit test
    // private ServiceInterface $helloService;


    //  ServiceInterface tidak harus didaftarkan di service provider
    // karena otomatis diinject dependencynya oleh laravel dengan service container
    // Ketika request masuk ke aplikasi Laravel dan controller diakses, Laravel secara otomatis akan mendeteksi bahwa controller membutuhkan instance dari ServiceClass dan akan mencoba membuat instance tersebut dari container layanan (service container).

    public function __construct(ServiceClass $helloService)
    {
        $this->helloService = $helloService;
    }

    public function woi(string $name): string
    {
        return $this->helloService->woi($name);
    }

    /* Namun karena service interface tidak didaftarkan di service provider, maka akan membuat object baru terus menerus
    */
}
