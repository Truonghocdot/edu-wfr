<?php

use Illuminate\Support\Facades\Route;

/* Routes for User */

Route::get('/', function () {
    return view('user.index');
})->name('index');

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::get('/createAccount', function () {
    return view('user.createAccount');
})->name('createAccount');

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::get('/foundItems', function () {
    return view('user.foundItems');
})->name('foundItems');

Route::get('/lostItems', function () {
    return view('user.lostItems');
})->name('lostItems');

Route::get('/messages', function () {
    return view('user.messages');
})->name('messages');

Route::get('/report', function () {
    return view('user.report');
})->name('report');

Route::get('/reportFoundItem', function () {
    return view('user.reportFoundItem');
})->name('reportFoundItem');

Route::get('/reportLostItem', function () {
    return view('user.reportLostItem');
})->name('reportLostItem');

Route::get('/userDashboard', function () {
    return view('user.userDashboard');
})->name('userDashboard');

Route::get('/viewFoundItem', function () {
    return view('user.viewFoundItem');
})->name('viewFoundItem');

Route::get('/viewLostItem', function () {
    return view('user.viewLostItem');
})->name('viewLostItem');





/* Routes for Admin */

Route::get('/adminLogin', function () {
    return view('admin.login');
})->name('adminLogin');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/admin/claims', function () {
    return view('admin.claims');
})->name('claims');

Route::get('/admin/items', function () {
    return view('admin.items');
})->name('items');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('users');

Route::get('/admin/message', function () {
    return view('admin.message');
})->name('message');




