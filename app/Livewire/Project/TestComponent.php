<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Scenario;
use Livewire\Component;
use Livewire\Attributes\Locked;

class TestComponent extends Component
{
    #[Locked]
    public $projectId;
    public $project;
    public $scenarios = [];
    public $cases = [];

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        $this->projectId = $this->project->id;
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
        $this->validateForm();

        foreach ($this->project->scenarios as $sIndex => $scenario) {

            $scenario->scenario_name = $this->scenario_name[$sIndex]['scenario_name'];
            $scenario->save();
        }
    }

    public function validateForm()
    {
        $this->validate([
            'scenarios.*.scenario_name' => 'required'
        ]);
    }

    public function render()
    {
        return view('livewire.project.test-component');
    }
}
