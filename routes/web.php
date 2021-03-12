<?php

use App\Http\Controllers\Auth\LogingController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FeedLikeController;
use Illuminate\Support\Facades\Route;

Route::get('/,', function() {
    return view('home');
})->name('homepage');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LogingController::class, 'index'])->name('login');
Route::post('/login', [LogingController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');
Route::post('/feeds', [FeedController::class, 'store']);
Route::delete('/feeds/{feed}', [FeedController::class, 'destroy'])->name('feeds/destroy');

Route::post('/feeds/{feed}/likes', [FeedLikeController::class, 'store'])->name('feeds/likes');
Route::delete('/feeds/{feed}/likes', [FeedLikeController::class, 'destroy'])->name('feeds/likes');

