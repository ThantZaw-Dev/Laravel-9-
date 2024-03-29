<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/category', CategoryController::class)->except('show');
    Route::resource('/posts', PostController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class)->middleware('isAdmin');
});

Route::get("/test", [App\Http\Controllers\TestController::class,'index'])->name("test");


