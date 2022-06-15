<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PushController;
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
        Route::get('/performances', [PerformanceController::class, 'getAll']);
        Route::get('/performance/{id}', [PerformanceController::class, 'get']);
        Route::get('/', function () {
            return view('index');
        });
        
        Route::get('/like-performance/{id}',[LikeController::class,'likePerformance'])->name('like.performance');
        Route::get('/unlike-performance/{id}',[LikeController::class,'unlikePerformance'])->name('unlike.performance');

        Route::get('/faqs',[FaqController::class,'getAll']);

        Route::get('/likes', [PerformanceController::class, 'getAllLikes']);

        Route::post('/push', [PushController::class,'store']);
    });

   
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

