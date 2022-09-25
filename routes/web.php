<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;

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
Route::get('/', [UserController::class,'store']);

Route::get('/customers',[CustomerController::class,'index'])->middleware('auth');
Route::post('/create/customer',[CustomerController::class,'store'])->middleware('auth');
Route::get('/create/customer',[CustomerController::class,'create'])->middleware('auth');
Route::delete('/customer/{customer}',[CustomerController::class,'destroy'])->middleware('auth');

Route::post('/customer/{customer}/shoppings',[ShoppingController::class,'index'])->middleware('auth');
Route::get('/customer/{customer}/shoppings',[ShoppingController::class,'index'])->middleware('auth');
Route::get('/create/shopping',[ShoppingController::class,'create'])->middleware('auth');
Route::post('/create/shopping',[ShoppingController::class,'store'])->middleware('auth');
Route::delete('/shopping/{shopping}',[ShoppingController::class,'destroy'])->middleware('auth');



Route::get('/logout',[UserController::class,'destroy'])->middleware('auth');
Route::post('/login',[UserController::class,'create'])->middleware('guest');

Route::get('/dashboard',[ItemController::class,'index'])->middleware('auth');

Route::post('/create/category',[CategoryController::class,'store'])->middleware('auth');
Route::get('/create/category',[CategoryController::class,'create'])->middleware('auth');
Route::get('/create',[ItemController::class,'create'])->middleware('auth');

Route::post('/create',[ItemController::class,'store'])->middleware('auth');
Route::delete('/{item}',[ItemController::class,'destroy'])->middleware('auth');
Route::post('/{item}/{mode}',[ItemController::class,'update'])->middleware('auth');



