<?php

use App\Http\Controllers\Dashboard\PhoneController;
use App\Http\Controllers\Dashboard\StudentController;
use App\Http\Controllers\Dashboard\TestController;
use App\Http\Controllers\Dashboard\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/my/dashboard', function () {
    return view('pages.dashboard');
})->name('my.dashboard')->middleware('auth');
Route::resource('/my/dashboard/student', StudentController::class )->middleware('auth');
Route::resource('/my/dashboard/test', TestController::class )->middleware('auth');
Route::resource('/my/dashboard/work',WorkController::class)->middleware('auth');
Route::resource('/my/dashboard/phonemy', PhoneController::class )->middleware('auth');
Route::get('user', [PhoneController::class, 'index']);

