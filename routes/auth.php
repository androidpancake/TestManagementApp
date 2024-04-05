<?php

use App\Http\Controllers\auth\AuthUserController;
use App\Http\Controllers\auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthUserController::class, 'index'])->name('login');
Route::post('authenticate', [AuthUserController::class, 'authenticate'])->name('auth');
Route::post('ldap', [AuthUserController::class, 'ldap'])->name('ldap.auth');
Route::post('logout', [AuthUserController::class, 'logout'])->name('logout');
Route::get('change-password', [ResetPasswordController::class, 'index'])->name('change.password');
Route::post('change', [ResetPasswordController::class, 'store'])->name('change');
