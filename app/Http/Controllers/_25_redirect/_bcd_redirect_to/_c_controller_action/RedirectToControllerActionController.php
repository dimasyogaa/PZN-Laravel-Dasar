<?php

namespace App\Http\Controllers\_25_redirect\_bcd_redirect_to\_c_controller_action;


use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RedirectToControllerActionController extends Controller
{


    public function redirectAction(): RedirectResponse
    {

        return redirect()->action([RedirectToControllerActionController::class, 'x'],
            [
                'name' => 'Dimas'
            ]
        );
    }

    public function x(string $name): string
    {

        return "Redirect To Action Controller : redirectHello $name";
    }


}
