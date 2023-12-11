<?php

use App\Http\Controllers\auth\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthUserController::class, 'index'])->name('auth.login');
Route::post('authenticate', [AuthUserController::class, 'authenticate'])->name('auth');
