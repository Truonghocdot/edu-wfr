<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PanelControll;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/* Routes for User */

Route::get('/', [MainController::class, 'index'])->name('index');

Route::middleware('auth')->get('/home', [MainController::class, 'home'])->name('home');

Route::get('/createAccount', [AuthController::class, 'register'])->name('createAccount');

Route::post('/createAccount', [AuthController::class, 'registerPost'])->name('createAccountPost');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/* Found Items Routes */
Route::get('/foundItems', [ItemController::class, 'foundItems'])->name('foundItems');
Route::get('/viewFoundItem/{id}', [ItemController::class, 'viewFoundItem'])->name('viewFoundItem');

/* Lost Items Routes */
Route::get('/lostItems', [ItemController::class, 'lostItems'])->name('lostItems');
Route::get('/viewLostItem/{id}', [ItemController::class, 'viewLostItem'])->name('viewLostItem');

/* Authenticated User Routes */
Route::middleware('auth')->group(function () {
    Route::get('/userDashboard', [ItemController::class, 'userDashboard'])->name('userDashboard');
    
    Route::get('/reportFoundItem', [ItemController::class, 'reportFoundItem'])->name('reportFoundItem');
    Route::post('/reportFoundItem', [ItemController::class, 'storeFoundItem'])->name('storeFoundItem');
    
    Route::get('/reportLostItem', [ItemController::class, 'reportLostItem'])->name('reportLostItem');
    Route::post('/reportLostItem', [ItemController::class, 'storeLostItem'])->name('storeLostItem');
    
    Route::get('/messages', [ItemController::class, 'messages'])->name('messages');
    
    Route::get('/report', [ItemController::class, 'report'])->name('report');

    // Claim routes
    Route::post('/items/{item}/claim', [ItemController::class, 'createClaim'])->name('createClaim');
    Route::delete('/items/{item}', [ItemController::class, 'deleteItem'])->name('deleteItem');
});

/* Routes for Admin */

Route::get('/adminLogin', [AuthController::class, 'adminLogin'])->name('adminLogin');
Route::post('/adminLogin', [AuthController::class, 'adminLoginPost'])->name('adminLoginPost');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [PanelControll::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/claims', [PanelControll::class, 'claims'])->name('claims');
    Route::post('/admin/claims/{claim}/approve', [PanelControll::class, 'approveClaim'])->name('approveClaim');
    Route::post('/admin/claims/{claim}/reject', [PanelControll::class, 'rejectClaim'])->name('rejectClaim');
    Route::get('/admin/items', [PanelControll::class, 'items'])->name('items');
    Route::delete('/admin/items/{item}', [PanelControll::class, 'deleteItem'])->name('adminDeleteItem');
    Route::get('/admin/users', [PanelControll::class, 'users'])->name('users');
    Route::post('/admin/users/{user}/role', [PanelControll::class, 'updateUserRole'])->name('updateUserRole');
    Route::get('/admin/message', [PanelControll::class, 'message'])->name('message');
});
