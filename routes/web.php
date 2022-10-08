<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\Localize;

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
Route::group(['prefix' => '{loc?}','middleware' => 'localize'],function(){
    Route::get('/', [UserController::class,'store']);
    Route::get('/localize/{mode}',[UserController::class,'edit']);
    Route::get('/logout',[UserController::class,'destroy'])->middleware('auth');
    Route::post('/login',[UserController::class,'create'])->middleware('guest');

    Route::resource('/customers',CustomerController::class)->middleware('auth');

    Route::post('/customer/{customer}/shoppings',[ShoppingController::class,'index'])->middleware('auth');
    Route::get('/customer/{customer}/shoppings',[ShoppingController::class,'index'])->middleware('auth');
    Route::resource('/shoppings',ShoppingController::class)->middleware('auth');

    Route::post('/customer/{customer}/payments',[PaymentController::class,'index'])->middleware('auth');
    Route::get('/customer/{customer}/payments',[PaymentController::class,'index'])->middleware('auth');
    Route::resource('/payments',PaymentController::class)->middleware('auth');

    Route::resource('/items',ItemController::class)->middleware('auth');

    Route::resource('/category',CategoryController::class)->middleware('auth');

});




