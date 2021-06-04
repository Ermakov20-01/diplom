<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function showReg()
    {
        return view('reg');
    }

    public function login(Request $request){
        Auth::attempt([
            'login' => $request -> login,
            'password' => $request -> password,
        ]);
        return redirect('/');
    }

    public function userCreate(Request $request)
    {
        User::create([
           'name' => $request -> name,
           'login' => $request -> login,
           'email' => $request -> email,
           'password' => Hash::make($request -> password),
        ]);
        return redirect('/auth');
    }

    public function logout(){
        Auth::logout();
        return back();
    }
}
