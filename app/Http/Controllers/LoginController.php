<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->with('eror','Email atau Password Salah');
    }
}
