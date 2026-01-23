<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Auth::routes();

Route::middleware('guest')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('video', [HomeController::class, 'video'])->name('video');
    });

