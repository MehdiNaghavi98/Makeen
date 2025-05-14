<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ShowAuthForm()
    {
        return view('auth.index');
    }

    public function Register(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|',
            'RePassword' => 'required|string|',
            'phone' => 'required',
            'role' => 'required'
        ]);
        if(User::where('phone' , $request->phone)->exists())
        {
            $error = 'Phone Already Exist';
            return view('auth.index' , compact('error'));
        }
        if ($request->password != $request->RePassword)
        {
            $error = 'password not match';
            return view('auth.index' , compact('error'));
        }
        if (strlen($request->password < 6))
        {
            $error = 'password should be at least 6 characters';
            return view('auth.index' , compact('error'));
        }

        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone
        ]);
        $user->assignRole($request->role);






    }


}
