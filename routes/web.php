<?php

use App\Http\Controllers\auth\AuthUserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
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
