<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        return view('user.index');
    }


    // Route::get('/foundItems', [ItemController::class, 'foundItems'])->name('foundItems');

    // Route::get('/lostItems', [ItemController::class, 'lostItems'])->name('lostItems');

    // Route::get('/messages', [ItemController::class, 'messages'])->name('messages');

    // Route::get('/report', [ItemController::class, 'report'])->name('report');

    // Route::get('/reportFoundItem', [ItemController::class, 'reportFoundItem'])->name('reportFoundItem');

    // Route::get('/reportLostItem', [ItemController::class, 'reportLostItem'])->name('reportLostItem');

    // Route::get('/userDashboard', [ItemController::class, 'userDashboard'])->name('userDashboard');

    // Route::get('/viewFoundItem', [ItemController::class, 'viewFoundItem'])->name('viewFoundItem');

    // Route::get('/viewLostItem', [ItemController::class, 'viewLostItem'])->name('viewLostItem');

    public function foundItems(Request $request)
    {
        return view('user.foundItems');
    }

    public function lostItems(Request $request)
    {
        return view('user.lostItems');
    }

    public function messages(Request $request)
    {
        return view('user.messages');
    }

    public function report(Request $request)
    {
        return view('user.report');
    }

    public function reportFoundItem(Request $request)
    {
        return view('user.reportFoundItem');
    }

    public function reportLostItem(Request $request)
    {
        return view('user.reportLostItem');
    }

    public function userDashboard(Request $request)
    {
        return view('user.userDashboard');
    }

    public function viewFoundItem(Request $request)
    {
        return view('user.viewFoundItem');
    }

    public function viewLostItem(Request $request)
    {
        return view('user.viewLostItem');
    }
}
