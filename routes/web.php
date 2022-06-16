<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'loginPage'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::view('/signup', 'signup')->name('signup');
Route::post('/signup', [AuthController::class, 'register']);

Route::get('/user/{id}/profile', [AuthController::class, 'guestProfile'])->name('guest.profile');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('user/{id}/{status}', [UserController::class, 'changeStatus'])->name('user.status');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
