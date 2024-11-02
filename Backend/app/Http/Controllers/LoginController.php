<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('home');
        } else {
            return redirect()->route('login.show')->with('status', 'Invalid Login');
        }
    }
}
