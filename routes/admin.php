<?php

use App\Http\Controllers\user\UserController;
use App\Livewire\User;
use App\Livewire\Users\Create;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('users', User::class)->name('user.index');
        Route::get('user/create', Create::class)->name('user.create');
    }
);
