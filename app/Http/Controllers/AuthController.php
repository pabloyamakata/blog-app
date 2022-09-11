<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {

    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function register()
    {

    }

    public function logout()
    {
        
    }
}
