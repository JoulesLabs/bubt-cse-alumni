<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/companies', [\App\Http\Controllers\Api\MiscController::class, 'getCompanies'])->name('api:companies');
Route::get('/tags', [\App\Http\Controllers\Api\MiscController::class, 'getTags'])->name('api:tags');
