<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/register', [AdminController::class,'showRegisterForm'])->name('admin.register.form');
    Route::post('/register', [AdminController::class,'register'])->name('admin.register');
    Route::get('/login', [AdminController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminController::class,'login'])->name('admin.login');
});
