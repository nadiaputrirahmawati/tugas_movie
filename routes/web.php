<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'data']);
Route::get('/movie/detail/{id}', [MovieController::class, 'detailMovie']);
Route::get('/movie/all', [MovieController::class, 'movieall']);
Route::get('/movie/news', [MovieController::class, 'movienews']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::get('movie/dashboard', [DashboardController::class, 'index']);
    Route::resource('genre', GenreController::class);
    Route::resource('movie', MovieController::class);
    Route::resource('cast', CastController::class);
});
