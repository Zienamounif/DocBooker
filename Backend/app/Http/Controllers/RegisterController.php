<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'role'=>'required',
            'password'=>'required|confirmed'
        ]);


        $input = $request->all();
        $input['password'] = encrypt($input['password']);
        $user = User::create($input);

        if ($input['role']=='doctor'){

            doctor::create([
                'user_id'=>$user->id,
            ]);
        }
        else
        {
            patient::create([
                'user_id'=>$user->id,
            ]);
        }
        Auth::login($user);


        return redirect()->route('home');

    }






}
