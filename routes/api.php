<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\InformationController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/information', InformationController::class);
    Route::resource('/students', StudentController::class);
});

Route::post('login', [AccountController::class, 'login']);
Route::post('register', [AccountController::class, 'register']);

