<?php

use GuzzleHttp\Psr7\Request;
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
    return view('welcome');
});

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/admin', function(){
//     return view('admin');
// });

// routes/web.php
use App\Http\Controllers\BlogController;
Route::get('/blog', [BlogController::class, 'index']);

use App\Http\Controllers\AuthController;//login route by controller
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\RegisterController;//register route by controller
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
