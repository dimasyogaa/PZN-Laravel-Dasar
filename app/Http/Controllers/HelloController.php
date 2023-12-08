<?php

namespace App\Http\Controllers;

use App\Services\_7_serviceprovider\HelloService;
use App\Services\_7_serviceprovider\HelloServiceIndonesia;
use Illuminate\Http\Request;

// cara membuat controller di terminal :
// php artisan make:controller HelloController
class HelloController extends Controller
{

    private HelloService $helloService;


    // sebelumnya Hello Service telah didaftarkan di service container melalui service provider
    // sehingga otomatis diinject dependencynya oleh laravel dengan service container
    public function __construct(HelloServiceIndonesia $helloService)
    {
        $this->helloService = $helloService;
    }


    /** Request
     * Di PHP, biasanya ketika kita ingin mendapatkan detail dari request biasanya kita lakukan menggunakan global variable seperti $_GET, $_POST, dan lain-lain
     * Di Laravel, kita tidak perlu melakukan itu lagi, HTTP Request di bungkus dalam sebuah object dari class Illuminate\Http\Request
     * Dan kita bisa menambahkan Request di parameter function di Router atau di Controller, 
     * dan secara otomatis nanti Laravel akan melakukan dependency injection data Request tersebut
     */
    // secara otomatis, laravel menginject data request
    public function hello(Request $request, string $name): string
    {
        return $this->helloService->hello($name);
    }

    public function request(Request $request): string
    {
        /** Request Path
         * $request->path() untuk mendapatkan path, misal http://example.com/foo/bar, akan mengembalikan foo/bar
         * $request->url() untuk mendapat URL tanpa query parameter
         * $request->fullUrl() untuk mendapatkan URL dengan query parameter
         */

        /** Request Method
         * $request->method() akan mengembalikan HTTP Method
         * $request->isMethod(method) digunakan untuk mengecek apakah request memiliki HTTP method sesuai parameter atau tidak, misal $request->isMethod(‘post’)

         * $request->header(key) digunakan untuk mendapatkan data header dengan key parameter
         * $request->header(key, default) digunakan untuk mendapatkan data header dengan key parameter, jika tidak ada maka akan mengembalikan data default nya
         * $request->bearerToken() digunakan untuk mendapatkan informasi token Bearer yang terdapat di header Authorization, dan secara otomatis menghapus prefix Bearer nya

         */

        return $request->path() . PHP_EOL .
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->header("Accept") . PHP_EOL;
    }
}
