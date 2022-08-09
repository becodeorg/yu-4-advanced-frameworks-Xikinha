<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Display dashboard page
    public function show(Request $request)
    {
        return view('dashboard');
    }

}