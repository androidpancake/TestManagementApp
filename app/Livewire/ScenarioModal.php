<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Scenario;
use Livewire\Component;

class ScenarioModal extends Component
{
    // source data variable
    public $id;
    public $project;
    public $scenarios;

    // field variable
    public $scenario_name;
    public $case;
    public $test_step_id;
    public $test_case;
    public $expected_result;
    public $category;
    public $severity;
    public $status;

    public function mount($id = null)
    {
        $this->project = Project::with(['test_level', 'members', 'issue', 'scenarios'])->findOrFail($id);
        $this->id = $this->project->id;
        $this->scenarios = Scenario::with(['case.step'])->where('project_id', $this->project->id)->get();

        // foreach ($this->project->scenarios as $scenario) {
        //     $this->scenario_name = $scenario->scenario_name;
        // }
    }

    public function render()
    {
        return view('livewire.project.scenario-component');
    }
}
