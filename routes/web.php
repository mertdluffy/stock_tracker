<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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

Route::get('/',[ItemController::class,'index']);
Route::get('/create',[ItemController::class,'create']);
Route::post('/create',[ItemController::class,'store']);
Route::delete('/{item}',[ItemController::class,'destroy']);
Route::post('/{item}/{mode}',[ItemController::class,'update']);
