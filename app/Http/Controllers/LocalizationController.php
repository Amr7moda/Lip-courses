<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function changeLanguage()
    {
        $locale = request('locale');
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
