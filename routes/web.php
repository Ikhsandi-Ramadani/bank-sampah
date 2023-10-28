<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::post('/hitung', [UserController::class, 'hitung'])->name('hitung');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'proses_login'])->name('proses_login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return view('admin.pages.dashboard.index');
        })->name('dashboard');
        Route::resource('jenis-sampah', JenisSampahController::class);
    });
});
