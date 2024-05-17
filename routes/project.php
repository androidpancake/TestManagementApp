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
use App\Livewire\Form\Form;
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

        Route::get('sit', SIT::class)->name('sit.index');
        Route::get('uat', UAT::class)->name('uat.index');
        Route::get('pit', PIT::class)->name('pit.index');

        Route::get('export/{id}', [ExportController::class, 'export'])->name('generate');

        Route::get('project/form/{project}', Form::class)->name('form');
        Route::resource('project/form/scenario', ScenarioController::class);
        Route::post('attach_case', [ScenarioController::class, 'attach_case'])->name('scenario.attach_case');
        Route::post('attach_step', [ScenarioController::class, 'attach_step'])->name('scenario.attach_step');
        Route::delete('delete_case/{id}', [ScenarioController::class, 'destroy_case'])->name('case.delete');
        Route::delete('delete_step/{id}', [ScenarioController::class, 'destroy_step'])->name('step.delete');

        Route::get('form/test/{id}', TestComponent::class)->name('test');

        // test
        Route::get('test-search/{id}', [ScenarioController::class, 'getSearch']);
        Route::get('scenario-list', function () {
            return ModelsProject::with('scenarios.case.step')->get();
        });
    }
);
//livewire
