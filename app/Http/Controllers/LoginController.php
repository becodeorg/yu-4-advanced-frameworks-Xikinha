<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Redirect;

class LoginController extends Controller
{
    // Display login page
    public function show(Request $request)
    {
        return view('login');
    }

    // Handle login request
    public function store(Request $request)
    {
        if (filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)) {
            echo "Email address is valid";
            $attributes = $this->validate($request, [
                'email' => 'required|exists:users,email',
                'password' => 'required',
            ]);
            print_r($attributes);
        }

        // dd($request->input('email'));
        
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your email is not registered.',
                'password' => 'Your password is incorrect.'
            ]);
        }

        Session::regenerate();

        return Redirect::route('dashboard')->with('success', 'You have successfully logged in.');

    }

}

