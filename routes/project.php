<?php

use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\sit\SitController;
use App\Livewire\DetailProject;
use App\Livewire\Form;
use App\Livewire\Project;
use Illuminate\Support\Facades\Route;

Route::get('page/project', [ProjectController::class, 'index'])->name('project.index');

//sit
Route::get('form1', [SitController::class, 'f1'])->name('sit.1');
Route::get('form2', [SitController::class, 'f2'])->name('sit.2');
Route::get('form3', [SitController::class, 'f3'])->name('sit.3');
Route::get('form4', [SitController::class, 'f4'])->name('sit.4');
Route::get('form5', [SitController::class, 'f5'])->name('sit.5');
Route::get('form6', [SitController::class, 'f6'])->name('sit.6');

Route::get('sit/create', [SitController::class, 'create'])->name('sit.create');

Route::middleware(['auth', 'role:user'])->group(
    function () {
        Route::get('project', Project::class);
        Route::get('project/detail/{id}', DetailProject::class);
        Route::get('sit', [SitController::class, 'index'])->name('sit.index');
        Route::get('sit/form', Form::class);
    }
);
//livewire
