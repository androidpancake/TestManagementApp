<?php

use App\Http\Controllers\auth\AuthUserController;
use App\Livewire\Dashboard;
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

Route::get('/', Dashboard::class)->middleware('auth');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', Dashboard::class);
});

Route::get('/projects', function () {
    return view('project.index');
});

Route::get('/users', function () {
    return view('user.index');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/project.php';
require __DIR__ . '/admin.php';
