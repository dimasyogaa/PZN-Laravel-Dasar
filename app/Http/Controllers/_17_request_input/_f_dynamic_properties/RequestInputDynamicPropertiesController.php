<?php

namespace App\Http\Controllers\_17_request_input\_f_dynamic_properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestInputDynamicPropertiesController extends Controller
{
    public function dynamicProperties(Request $request)
    {
        // Menggunakan dynamic properties untuk mengakses input dari request
        $firstName = $request->first_name ?? $request->input('first_name', "kosong default");
        $lastName = $request->last_name ?? $request->input('last_name', "kosong default");

        return "First Name: $firstName, Last Name: $lastName";
    }

}

/*
Operator ?? dalam PHP adalah operator null coalescing, yang merupakan bagian dari fitur PHP 7. Operator ini digunakan untuk mengevaluasi nilai kiri jika nilai tersebut bukan null. Jika nilai tersebut null, maka akan mengembalikan nilai dari ekspresi di sebelah kanan.

Jadi, dalam konteks $request->first_name ?? $request->input('first_name'), operator ?? memeriksa apakah properti first_name pada objek $request tidak null. 

Jika tidak null (artinya properti first_name ada dan nilainya bukan null), maka nilai dari $request->first_name akan digunakan. 

Jika first_name adalah null, maka akan mengambil nilai dari input dengan key 'first_name' menggunakan metode input() dari objek $request.

Ini berguna dalam situasi di mana Anda ingin menggunakan nilai default jika properti dari objek tidak terdefinisi atau bernilai null. Dengan menggunakan operator null coalescing (??), Anda dapat dengan mudah menangani kasus di mana properti atau variabel tidak memiliki nilai yang diharapkan.
 */
