<?php

use App\Http\Controllers\DraftController;
use App\Http\Controllers\project\ExportController;
use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\sit\SitController;
use App\Livewire\DetailDraft;
use App\Livewire\DetailProject;
use App\Livewire\Draft;
use App\Livewire\DraftProject;
use App\Livewire\Form;
use App\Livewire\Form\Form as FormForm;
use App\Livewire\PIT;
use App\Livewire\Project;
use App\Livewire\ProjectDraft;
use App\Livewire\SIT;
use App\Livewire\UAT;
use Illuminate\Support\Facades\Route;

Route::get('page/project', [ProjectController::class, 'index'])->name('project.index');


Route::middleware(['auth', 'role:user'])->group(
    function () {
        Route::get('project', Project::class)->name('project');
        Route::get('project/detail/{id}', DetailProject::class)->name('project.detail');
        Route::get('sit/form', Form::class)->name('sit.form');
        Route::get('uat/form', Form::class)->name('uat.form');
        Route::get('pit/form', Form::class)->name('pit.form');
        Route::get('sit', SIT::class)->name('sit.index');
        Route::get('uat', UAT::class)->name('uat.index');
        Route::get('pit', PIT::class)->name('pit.index');
        Route::get('project/draft', Draft::class)->name('draft');
        Route::get('project/draft/{id}', DetailDraft::class)->name('draft.detail');

        Route::get('export/{id}', [ExportController::class, 'export'])->name('generate');

        Route::get('form/{id}', FormForm::class)->name('form');
    }
);
//livewire
