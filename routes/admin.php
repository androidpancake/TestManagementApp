<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('users', [UserController::class, 'index'])->name('user.index');
    }
);
