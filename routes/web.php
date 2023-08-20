<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\Admin\IndexController::class,"indexHTML"]);



Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,"loginHTML"]);
Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,"login"]);
