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

/**後台*/
Route::middleware(["AdminLoginAuth"])->group(function () {
    //Dashboard
    Route::get('/',[\App\Http\Controllers\Admin\IndexController::class,"indexHTML"]);
    //Member_Data
    Route::get('/Member_Data',[\App\Http\Controllers\Admin\MemberDataController::class,"listHTML"]);
    Route::get('/Member_Data/{ID}',[\App\Http\Controllers\Admin\MemberDataController::class,"updateHTML"])->whereNumber("ID");
    Route::post('/Member_Data/{ID}',[\App\Http\Controllers\Admin\MemberDataController::class,"update"])->whereNumber("ID");
    Route::post('/Member_Data/del',[\App\Http\Controllers\Admin\MemberDataController::class,"del"]);
    Route::get('Member_Data/export', [\App\Http\Controllers\Admin\MemberDataController::class, 'export']);

    //登入
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,"loginHTML"]);
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,"login"]);
});

