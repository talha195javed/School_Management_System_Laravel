<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPageController extends Controller
{
    public function website()
    {
        return view('website');
    }
}
