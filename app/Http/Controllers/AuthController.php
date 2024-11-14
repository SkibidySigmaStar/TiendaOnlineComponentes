<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view("clients.home");
    }

    public function login_form(){
        return view("auth.login");
    }

    public function home(){
        /*
        if (Auth::user()->role_id == 4) {
            return view('employee.home');
        } else {
            return view('clients.home');
        }*/
        return view('clients.home');
    }

    public function to_logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function to_login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($credentials)){
            //$request->session()->regenerate();
            //dd(Auth::user());
            return to_route('home');
        }else{
            return back()->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }

}