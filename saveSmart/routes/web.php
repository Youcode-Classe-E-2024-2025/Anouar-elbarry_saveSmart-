<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\expenseController;
use App\Http\Controllers\goalsController;
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
Route::get('/dashboard', [DashboardController::class,'index']);
Route::get('/chart-data', [DashboardController::class,'getchartData']);


Route::get('/reports', function () {
    return view('back/reports');
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/categories/create', [CategoryController::class, 'create'])->name('create.category');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('create.delete');



// Auth
Route::get('/auth',[AuthController::class,'index'])->name('auth')->middleware('guest');
Route::post('/auth/register',[AuthController::class,'register'])->name('register');
Route::post('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout');

//profile
Route::post('/select/create',[ProfilesController::class,'create'])->name('create.profile');
Route::get('/profile/form',function(){
    return view('front.createProfile');
});
Route::get('/select',[ProfilesController::class, 'index'])->name('profile-Selection');
Route::get('/select/{id}',[ProfilesController::class, 'select'])->name('select');
Route::get('profile/{id}', [ProfilesController::class,'show'])->name('profile.show');

//income
Route::post('/dashboard/add_income',[IncomeController::class,'create'])->name('create.income');
Route::delete('/income/delete/{id}',[IncomeController::class,'destroy'])->name('delete.income');
Route::get('/income',[IncomeController::class,'index'])->name('income.home');
Route::get('/income/{id}/edit',[IncomeController::class,'edit']);
Route::put('/income/{id}/update', [IncomeController::class, 'update'])->name('income.update');

//expense
Route::get('/expense',[expenseController::class,'index'])->name('expense');
Route::get('/expense/{id}/edit',[expenseController::class,'edit']);
Route::put('/expense/{id}/update',[expenseController::class,'update']);
Route::post('/expense/create',[expenseController::class,'create'])->name('expense.create');
Route::delete('/expense/delet/{id}',[expenseController::class,'destroy'])->name('expense.delet');

//Goals
Route::get('/goals', [goalsController::class,'index'])->name('goals');
Route::post('/goals/create', [goalsController::class,'create'])->name('goal.create');