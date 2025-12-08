<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelControll extends Controller
{
    public function index(Request $request)
    {
        return view('user.index');
    }
    public function dashboard(Request $request)
    {
        return view('user.dashboard');
    }
    public function claims(Request $request)
    {
        return view('user.claims');
    }
    public function items(Request $request)
    {
        return view('user.items');
    }
    public function users(Request $request)
    {
        return view('user.users');
    }
    public function message(Request $request)
    {
        return view('user.message');
    }
}