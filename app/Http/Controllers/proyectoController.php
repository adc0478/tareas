<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class proyectoController extends Controller
{
    public function __invoke()
    {
        return view('proyecto');
    }
}
