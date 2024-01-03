<?php

namespace App\Http\Controllers\_29_url_generation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FormController extends Controller
{
    public function form(): Response
    {
        return response()->view("_27_cross_site_request_forgery.csrf_a_form");
    }

    public function submitForm(Request $request): Response
    {
        $name = $request->input("nama_pengguna");
        return response()->view("_27_cross_site_request_forgery.csrf_b_destination", [
            "name" => $name
        ]);
    }
}
