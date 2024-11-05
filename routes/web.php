<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Auth::routes();

Route::get('/', function () {
    return view('auth.login'); 
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');



Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');


   