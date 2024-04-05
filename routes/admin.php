<?php

use App\Http\Controllers\user\UserController;
use App\Livewire\User;
use App\Livewire\Users\Create;
use App\Livewire\Users\Users;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('users', User::class)->name('user.index');
        Route::get('user/create', Users::class)->name('user.create');
        // Route::get('user/edit', Users::class)->name('user.edit');
    }
);
