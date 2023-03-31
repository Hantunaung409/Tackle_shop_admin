<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //direct to login page
    public function loginPage(){
        return view('auth.login');
    }

    //direct to register page
    public function registerPage(){
        return view('auth.register');
    }
    //direct to dashboard
    public function dashboard(){
        if(Auth::user()->role == 'user'){
            return view('wait');
        }else{
            return view('welcome');
        }
    }
}
