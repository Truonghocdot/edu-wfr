<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index');
    }

    public function home(Request $request)
    {
        return view('user.home');
    }
}   