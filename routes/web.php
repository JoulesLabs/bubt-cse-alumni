<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::get('/t', function () {
    dd(\App\Enums\MsgType::from('success')->name);
});
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::view('/signup', 'signup')->name('signup');
Route::post('/signup', [AuthController::class, 'register']);

Route::get('/user/{id}/profile', [AuthController::class, 'guestProfile'])->name('guest.profile');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/profile/personal', [AuthController::class, 'updatePersonalInfo'])->name('profile.personal');
    Route::post('/profile/password', [AuthController::class, 'changePassword'])->name('profile.password');
    Route::post('/profile/professional', [AuthController::class, 'updateProfessionalInfo'])->name('profile.professional');
    Route::post('/profile/contacts', [AuthController::class, 'updateContacts'])->name('profile.contacts');
    Route::get('/users/{id}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('users/{id}/{status}', [UserController::class, 'changeStatus'])->name('user.status');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::post('/api/companies', [CompanyController::class, 'store'])->name('api:company.store');

    Route::get('/members/request', [DashboardController::class, 'getMemberRequests'])->name('members.request');
    Route::get('/members/{id}/{status}', [DashboardController::class, 'refererChangeStatusPage'])->name('member.status.change');
    Route::post('/members/{id}/{status}', [DashboardController::class, 'refererChangeStatus'])->name('member.status.change.submit');
});
