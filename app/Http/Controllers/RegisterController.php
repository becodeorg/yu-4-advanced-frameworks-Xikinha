<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Redirect;

class RegisterController extends Controller
{
    // Display registration page
    public function show(Request $request)
    {
        return view('register');
    }

    // Store new user details
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => ['required', 'min:3', 'max:255'],
            'email' => 'required|email:rfc,dns|max:255',
            'password' => 'required|min:8|max:255',
            'terms' => 'accepted',
            'policy' => 'accepted',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        $existingUsername = User::where('username', '=', $request->input('username'))->first();
        $existingEmail = User::where('email', '=', $request->input('email'))->first();

        if ($existingUsername === null && $existingEmail === null) {
            // User does not exist
            // Store new user data
            $user->save();

            return Redirect::route('login')->with('success', 'Thank you for signing up! Please log in to access the content.');

        } elseif ($existingUsername != null) {
            // Username exists
            return back()->with('error', 'Username already exists.');

        } elseif ($existingEmail != null) {
            // Email exists
            return back()->with('error', 'Email already exists.');
            
        } elseif ($existingUsername != null && $existingEmail != null) {
            // Username & email exist
            return back()->with('error', 'Username & email already exist.');
        }
    }
}

