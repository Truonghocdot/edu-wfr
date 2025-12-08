<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('user.login');
    }

    public function register(Request $request)
    {
        return view('user.createAccount');
    }

    public function loginPost(Request $request)
    {
        return view('user.loginPost');
    }



    public function logout(Request $request)
    {
        return view('user.logout');
    }

    public function registerPost(Request $request)
    {
        return view('user.registerPost');
    }


    public function adminLogin(Request $request)
    {
        return view('user.adminLogin');
    }

    public function adminLoginPost(Request $request)
    {
        return view('user.adminLoginPost');
    }
}
