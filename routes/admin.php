<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::get('users', [UserController::class, 'index'])->name('user.index');
