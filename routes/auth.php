<?php

use App\Http\Controllers\auth\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthUserController::class, 'index'])->name('login');
Route::post('authenticate', [AuthUserController::class, 'authenticate'])->name('auth');
Route::post('auth_ldap', [AuthUserController::class, 'ldap'])->name('ldap.auth');
Route::post('logout', [AuthUserController::class, 'logout'])->name('logout');
