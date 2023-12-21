<?php

namespace App\Http\Controllers\_18_input_type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InputTypeController extends Controller
{
    public function inputType(Request $request)
    {
        $name = $request->input("name");
        $married = $request->boolean("married");
        $birthDate = $request->date("birth_date", "Y-m-d");

        /*
        $birthDate = $request->date("birth_date", "Y-m-d"); mengembalikan objek date carbon

        karena mengembalikan objek date carbon, maka harus dikonversi menjadi string dengan cara 

        $birthDate->format('Y-m-d')
        */

        return json_encode([
            "name" => $name,
            "married" => $married,
            "birth_date" => $birthDate->format("Y-m-d")
        ]);
    }
}
