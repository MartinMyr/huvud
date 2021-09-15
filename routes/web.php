<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['user' => Auth::user()]);
    });
    Route::get('/register', function () {
        return view('register', ['user' => Auth::user()]);
    });
    Route::get('/profile', function () {
        return view('profile', ['user' => Auth::user()]);
    });

});
