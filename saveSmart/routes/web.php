<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\IncomeController;
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
Route::get('/dashboard', function () {
    return view('back/dashboard');
});
Route::get('/expense',[expenseController::class,'index'])->name('expense');
Route::post('/expense/create',[expenseController::class,'create'])->name('expense.create');
Route::get('/goals', function () {
    return view('back/goals');
});
Route::get('/reports', function () {
    return view('back/reports');
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories/create', [CategoryController::class, 'create'])->name('create.category');
Route::get('/select',[ProfilesController::class, 'index'])->name('profile-Selection');
Route::get('/select/{id}',[ProfilesController::class, 'select'])->name('select');
Route::get('/auth',[AuthController::class,'index'])->name('auth');
Route::post('/auth/register',[AuthController::class,'register'])->name('register');
Route::post('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/select/create',[ProfilesController::class,'create'])->name('create.profile');

Route::post('/dashboard/add_income',[IncomeController::class,'create'])->name('create.income');
Route::get('/income',[IncomeController::class,'index'])->name('income');