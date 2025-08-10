<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\VerificationController;

//Home Route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Auth::routes(['verify' => true]);

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

//dashboard route
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth', 'verified']);

//register route
Route::get('/register', [RegisterController::class, 'showSignUp'])->name('register');
Route::post('/register', [RegisterController::class, 'signUp'])->name('registration.register');

//login route
Route::get('/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
//logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
