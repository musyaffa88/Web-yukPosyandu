<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome',['title'=>'yukPosyandu']);
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/home');
        }
        return riderect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
