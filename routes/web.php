<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PanelControll;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/* Routes for User */

Route::get('/',[MainController::class,'index'])->name('index');

Route::middleware('auth')->get('/home', [MainController::class,'home'])->name('home');



Route::get('/createAccount', [AuthController::class, 'register'])->name('createAccount');

Route::post('/createAcconut', [AuthController::class, 'registerPost'])->name('createAcconutPost');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/foundItems', [ItemController::class, 'foundItems'])->name('foundItems');

Route::get('/lostItems', [ItemController::class, 'lostItems'])->name('lostItems');

Route::get('/messages', [ItemController::class, 'messages'])->name('messages');

Route::get('/report', [ItemController::class, 'report'])->name('report');

Route::get('/reportFoundItem', [ItemController::class, 'reportFoundItem'])->name('reportFoundItem');

Route::get('/reportLostItem', [ItemController::class, 'reportLostItem'])->name('reportLostItem');

Route::get('/userDashboard', [ItemController::class, 'userDashboard'])->name('userDashboard');

Route::get('/viewFoundItem', [ItemController::class, 'viewFoundItem'])->name('viewFoundItem');

Route::get('/viewLostItem', [ItemController::class, 'viewLostItem'])->name('viewLostItem');





/* Routes for Admin */

Route::get('/adminLogin', [AuthController::class, 'adminLogin'])->name('adminLogin');
Route::post('/adminLogin', [AuthController::class, 'adminLoginPost'])->name('adminLoginPost');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [PanelControll::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/claims', [PanelControll::class, 'claims'])->name('claims');
    Route::get('/admin/items', [PanelControll::class, 'items'])->name('items');
    Route::get('/admin/users', [PanelControll::class, 'users'])->name('users');
    Route::get('/admin/message', [PanelControll::class, 'message'])->name('message');
});
