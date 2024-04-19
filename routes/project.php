<?php

use App\Http\Controllers\DraftController;
use App\Http\Controllers\project\ExportController;
use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\ScenarioController;
use App\Http\Controllers\sit\SitController;
use App\Livewire\DetailDraft;
use App\Livewire\DetailProject;
use App\Livewire\Project\Draft;
use App\Livewire\DraftProject;
use App\Livewire\Form;
use App\Livewire\Form\Form as FormForm;
use App\Livewire\Project\PIT;
use App\Livewire\Project\Project;
use App\Livewire\Project\ScenarioComponent;
use App\Livewire\Project\SIT;
use App\Livewire\Project\TestComponent;
use App\Livewire\Project\UAT;
use App\Livewire\ProjectDraft;
use App\Models\Project as ModelsProject;
use App\Models\Scenario;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:user'])->group(
    function () {
        Route::get('project', Project::class)->name('project');
        // Route::get('project/detail/{id}', DetailProject::class)->name('project.detail');

        Route::get('sit', SIT::class)->name('sit.index');
        Route::get('uat', UAT::class)->name('uat.index');
        Route::get('pit', PIT::class)->name('pit.index');

        Route::get('export/{id}', [ExportController::class, 'export'])->name('generate');

        Route::get('form/{id}', FormForm::class)->name('form');
        Route::resource('scenario', ScenarioController::class);
        Route::get('form/test/{id}', TestComponent::class)->name('test');

        // test
        Route::get('scenario-list', function () {
            return ModelsProject::with('scenarios.case.step')->get();
        });
    }
);
//livewire
