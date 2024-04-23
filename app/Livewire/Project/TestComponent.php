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
    public $scenario_name = [];
    public $cases = [];

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        $this->projectId = $this->project->id;
        $this->scenario_name = $this->project->scenarios->map(function ($scenario) {
            return $scenario->scenario_name;
        });
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
        foreach ($this->project->scenarios as $sIndex => $scenario) {
            $this->validate([
                'scenarios.$sIndex.scenario_name' => 'required'
            ]);

            $scenario->scenario_name = $this->scenario_name[$sIndex];
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
