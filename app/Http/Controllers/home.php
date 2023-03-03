<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home extends Controller
{
    function __invoke()
    {
        return view('home');
    }
}
