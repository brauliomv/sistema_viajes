<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function login(){
        $credentials = request(['email','password']);

        if(Auth::attempt($credentials)){
            request()->session()->regenerate();//Regenerar token de sesion
            return redirect()->route('welcome');
        }

        return redirect()->route('login_form')->with('error','Usuario y/o contraseña inválidos');
    }

    function logout(Request $request){
        Session::flush();
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_form');
    }
}
