<?php

use App\Http\Controllers\auth\AuthUserController;
use App\Http\Controllers\DraftController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\DraftProject;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class);
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});


Route::get('/users', function () {
    return view('user.index');
});

// Route::get('draft', [DraftController::class,'index'])->name('draft');


require __DIR__ . '/auth.php';
require __DIR__ . '/project.php';
require __DIR__ . '/admin.php';
