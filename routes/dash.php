<?php

use App\Http\Controllers\AddCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class,'index'])->name("dashindex")->middleware('auth');
Route::get('/dashbord/index',[DashbordController::class,'index'])->name("dashbord.index")->middleware('auth');
Route::get('/dashbord/category/index',[CategoryController::class,'index'])->name("dashbord.category.index")->middleware('auth');
Route::get('/dashbord/category/add',[AddCategoryController::class,'store'])->name("dashbord.category.add")->middleware('auth');