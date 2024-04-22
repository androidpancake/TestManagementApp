<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Locked;

class TestComponent extends Component
{
    #[Locked]
    public $projectId;
    public $project;
    public $scenario_name;
    public $case;
    public $test_step_id;
    public $test_step;
    public $expected_result;
    public $category;
    public $severity;
    public $status;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        $this->projectId = $this->project->id;
        $this->scenario_name = [];
        $this->case = [];
        $this->test_step_id = [];
        $this->test_step = [];
        $this->expected_result = [];
        $this->category = [];
        $this->severity = [];
        $this->status = [];
    }

    public function deleteScenario($id)
    {
        $project = Project::find($id);
        $project->scenarios()->each(function ($scenario) {
            $scenario->case()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->case()->delete();
        });

        $project->scenarios()->delete();
    }

    public function update()
    {
        $this->validate();

        foreach ($this->project->scenarios as $sIndex => $scenario) {
            $scenario->scenario_name = $this->scenario_name[$sIndex];
            $scenario->save();
        }
    }

    protected $rules = [
        'scenarios.*.scenario_name' => 'required',
    ];

    public function render()
    {
        return view('livewire.project.test-component');
    }
}
