<?php

use App\Http\Controllers\ClockingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Admin;


Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, '__invoke'])->name('dashboard');

    Route::middleware(Admin::class)->group(function () {

        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit/{user}', [UserController::class, 'update'])->name('user.update');
        Route::post('/user/create', [UserController::class, 'store']);
    });
    Route::get('/clocking', [ClockingController::class, 'index'])->name('clocking.index');
});

require __DIR__ . '/auth.php';
