<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
// routes/web.php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');



Route::post('/register', [UserController::class, 'register']);
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
