<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use App\Models\TestStep;
use Illuminate\Http\Client\Request;
use Livewire\Component;
use Livewire\Attributes\Locked;

class ScenarioComponent extends Component
{
    public $project;
    public $data;

    // field
    #[Locked]
    public $id;
    public $scenario_name;
    public $case;
    public $test_step;
    public $test_step_id;
    public $expected_result;
    public $category;
    public $severity;

    public $editMode = false;

    public function mount($id)
    {
        $this->project = Project::with(['test_level', 'members', 'issue', 'scenarios.cases.step'])->findOrFail($id);
        $this->id = $this->project;
    }

    public function rendering()
    {
    }

    public function rendered()
    {
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->scenarios()->each(function ($scenario) {
            $scenario->case()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->case()->delete();
        });

        $project->scenarios()->delete();

        return redirect()->back()
            ->with('success', 'Success Delete Scenario and child');
    }

    public function destroy_case($id)
    {
        $case = TestCase::find($id);
        $case->step()->each(function ($c) {
            $c->step()->delete();
        });

        return redirect()->back()->with('success', 'Success Delete Case and child');
    }

    public function destroy_step($id)
    {
        $step = TestStep::find($id);
        $step->delete();

        return redirect()->back()->with('success', 'Success Delete Step');
    }

    public function render()
    {
        return view('livewire.scenario.scenario-component');
    }
}
