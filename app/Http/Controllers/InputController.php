<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/** Request Input
 * Saat membuat aplikasi web, kita tahu bahwa dalam HTTP Request kita bisa mengirim data, 
 * baik itu melalui query parameter, atau melalui body (misal dalam bentuk form)
 * Biasanya kita menggunakan $_GET atau $_POST atau $_FILES, 
 * namun di Laravel, kita bisa menggunakan object Request untuk mendapatkan input yang dikirim melalui HTTP Request
 * 
 * Untuk mengambil input yang dikirim oleh user, tidak peduli apapun HTTP Method yang digunakan, dan dari mana asalnya, entah dari body atau query parameter
 * Untuk mengambil input user, kita bisa gunakan method input(key, default) pada Request, dimana jika key nya tidak ada, maka akan mengembalikan default value di parameter


 */

class InputController extends Controller
{

    // mengambil input
    public function hello(Request $request): string
    {
        $name = $request->input("name");
        return "Hello $name";
    }

    public function helloFirst(Request $request): string
    {
        $firstName = $request->input("name.first");
        return  "Hello " . $firstName;
    }

    // mengambil semua input
    public function helloAll(Request $request): string
    {
        $all = $request->input(); //return array
        return json_encode($all);
    }


    // mengambil array input
    public function helloArray(Request $request): string
    {
        $names = $request->input("products.*.name");
        return json_encode($names);
    }

    /** Input Query String
     * Method input() digunakan untuk mengambil data di semua input, baik itu query param ataupun body
     * Jika misal kita hanya butuh mengambil data di query param, kita bisa menggunakan method $request->query(key)
     * Atau jika semua query dalam bentuk array, kita bisa gunakan $request->query() tanpa parameter key
     */
    //
    /*** Dynamic Properties
     * Laravel juga mendukung Dynamic Properties yang secara otomatis akan mengambil key dari input Request
     * ketika kita menggunakan $request->first_name, jika dalam object Request tidak ada property dengan nama $first_name, 
     * maka secara otomatis akan mengambil input dengan key first_name
     * 
     public function hello(Request $request): string
     {
        $name = $request->name;
        return "Hello $name";
    }

     * 
     */
   
}
