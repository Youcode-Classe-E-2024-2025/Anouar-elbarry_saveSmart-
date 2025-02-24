<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilesController;
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
    return view('front/home');
})->name('home');
Route::get('/select',[ProfilesController::class, 'index'])->name('profile-Selection');
Route::get('/auth',[AuthController::class,'index'])->name('auth');
Route::post('/auth/register',[AuthController::class,'register'])->name('register');
Route::post('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/select/create',[ProfilesController::class,'create'])->name('create.profile');