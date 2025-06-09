<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;
use function Sodium\compare;

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
        if (User::where('phone', $request->phone)->exists()) {
            $error = 'Phone Already Exist';
            return view('auth.index', compact('error'));
        }
        if ($request->password != $request->RePassword) {
            $error = 'password not match';
            return view('auth.index', compact('error'));
        }
        if (strlen($request->password < 6)) {
            $error = 'password should be at least 6 characters';
            return view('auth.index', compact('error'));
        }
        $user = User::Create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'created_at' => now(),
        ]);
        $user->assignRole($request->role);
        $success = 'Register Successfully';
        return view('auth.index', compact('success' ));
    }

    public function Login(Request $request)
    {

        $request->validate([
            'phone' => 'required',
            'password' => 'required']);
        if (Auth::attempt(['phone' => $request->phone , 'password' => $request->password])) {
            $user = Auth::user();
            $role = $user->getRoleNames()->first();
            if ($role == 'seller')
            {
                return redirect()->route('Show-Panel')->with('success_login', 'Login Successfully');
            }
            if ($role === 'buyer')
            {
                return view('index');
            }
        }
        else
        {
            $error = 'phone or password not match';
            return view('auth.index', compact('error'));
        }
    }



}
