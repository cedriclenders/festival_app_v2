<?php

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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::get('/performances', [App\Http\Controllers\PerformanceController::class, 'getAll']);
        Route::get('/performance/{id}', [App\Http\Controllers\PerformanceController::class, 'get']);
        Route::get('/', function () {
            return view('index');
        });
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

