<?php

namespace App\Http\Controllers;

use Dotenv\Util\Str;
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


    // INPUT TYPE - konversi langsung ke tipe data yang diinginkan
    public function inputType(Request $request)
    {
        $name = $request->input("name");
        $married = $request->boolean("married");
        $birthDate = $request->date("birth_date", "Y-m-d");

        return json_encode([
            "name" => $name,
            "married" => $married,
            "birth_date" => $birthDate->format("Y-m-d")
        ]);
    }

    // FILTER REQUEST INPUT
    public function filterOnly(Request $request): string
    {
        $name = $request->only(["name.first", "name.last"]);
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        $name = $request->except(["admin"]);
        return json_encode($name);
    }


    /**
     * Kadang-kadang kita ingin menambahkan default input value ketika input tersebut tidak dikirim di request
     * Kita bisa menggunakan method merge(array) untuk menambah input ke request, dan jika ada key yang sama, otomatis akan diganti
     * Atau mergeIfMissing(array) untuk menambah input ke request, dan jika input dengan kay yang sama sudah ada, maka akan dibatalkan
     */
    public function filterMerge(Request $request): string
    {
        $request->merge(["admin" => false]);
        $user = $request->input();
        return json_encode($user);
    }
}
