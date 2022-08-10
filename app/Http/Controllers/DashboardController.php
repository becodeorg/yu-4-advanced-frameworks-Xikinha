<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Display dashboard page
    public function showDashboard(Request $request)
    {
        return view('dashboard');
    }

    // Display playlist page
    public function showPlaylist(Request $request)
    {
        return view('playlist');
    }

}