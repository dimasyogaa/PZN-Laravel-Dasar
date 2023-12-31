<?php

namespace App\Http\Controllers\_25_redirect\_bcd_redirect_to\_d_external_domain;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RedirectToExternalDomainController extends Controller
{
    public function redirectAway(): RedirectResponse
    {
        return redirect()->away("https://github.com/Yogadimas");
    }
}
