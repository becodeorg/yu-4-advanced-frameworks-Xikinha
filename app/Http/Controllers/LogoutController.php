<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redirect;

class LogoutController extends Controller
{
    // Logout user account
    public function perform(Request $request)
    {
        Session::flush();

        Auth::logout();

        return Redirect::route('home')->with('success', 'Goodbye!');
    }
}
