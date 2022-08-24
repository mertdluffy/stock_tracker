<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use App\Models\Category;
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
Route::get('/', function () {
    if (!Auth::check()) {
        try {
            User::factory()->create([
                'username' => 'admin',
                'password' => bcrypt('password'),
            ]);
            Category::factory()->create([
                'name' => 'Default',
                'slug' => 'default',
            ]);
        }catch (Exception $e){
            ;
        }

        return view('login');
    }
    else{
        return redirect('/dashboard');
    }
});


Route::get('/logout',[UserController::class,'destroy'])->middleware('auth');
Route::get('/dashboard',[ItemController::class,'index'])->middleware('auth');
Route::post('/login',[UserController::class,'create'])->middleware('guest');

Route::post('/create/category',[CategoryController::class,'store'])->middleware('auth');
Route::get('/create/category',[CategoryController::class,'create'])->middleware('auth');
Route::get('/create',[ItemController::class,'create'])->middleware('auth');
Route::post('/create',[ItemController::class,'store'])->middleware('auth');
Route::delete('/{item}',[ItemController::class,'destroy'])->middleware('auth');
Route::post('/{item}/{mode}',[ItemController::class,'update'])->middleware('auth');
