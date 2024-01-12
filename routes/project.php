<?php

use App\Http\Controllers\project\ExportController;
use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\sit\SitController;
use App\Livewire\DetailProject;
use App\Livewire\Form;
use App\Livewire\Project;
use App\Livewire\SIT;
use App\Livewire\UAT;
use Illuminate\Support\Facades\Route;

Route::get('page/project', [ProjectController::class, 'index'])->name('project.index');


Route::middleware(['auth', 'role:user'])->group(
    function () {
        Route::get('project', Project::class)->name('project');
        Route::get('project/detail/{id}', DetailProject::class);
        Route::get('sit/form', Form::class)->name('sit.form');
        Route::get('uat/form', Form::class)->name('uat.form');
        Route::get('sit', SIT::class)->name('sit.index');
        Route::get('uat', UAT::class)->name('uat.index');

        Route::get('export/{id}', [ExportController::class, 'export'])->name('generate');
        Route::get('word/{id}', [ExportController::class, 'word']);
    }
);
//livewire
