<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('auth.register');
    Route::post('register', 'store')->name('auth.store');
    Route::get('login', 'login')->name('auth.login');
    Route::post('login', 'check')->name('auth.check');
    Route::post('logout', 'logout')->name('auth.logout');
});

Route::controller(HomeController::class)->prefix('dashboard')->group(function () {
    Route::get('home', 'home')->name('dashboard.index');
});
