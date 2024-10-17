<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
Route::get('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');