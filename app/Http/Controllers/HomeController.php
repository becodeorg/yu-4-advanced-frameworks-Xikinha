<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    // Display home page
    public function show(Request $request)
    {
        return view('home');
    }

}
