<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

// Route::get('auth/user', [AuthController::class, 'user']);
Route::post('auth/loginAdmin', [AuthController::class, 'loginAdmin']);

Route::group( ['middleware' =>['auth:sanctum', 'verified']], function () {
    Route::get('auth/user', [AuthController::class, 'user']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('uploadImagesToBanner', [HomeController::class, 'uploadImagesToBanner']);
    Route::get('fetchImagesToBanner', [HomeController::class, 'fetchImagesToBanner']);
});

