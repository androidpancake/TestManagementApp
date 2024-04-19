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

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        // dd($this->project->scenarios);
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

    public function deleteCase($id)
    {
        $project = Project::find($id);
        $project->scenarios()->each(function ($scenario) {
            $scenario->case()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->case()->delete();
        });
    }

    public function deleteStep($id)
    {
        $project = Project::find($id);
        $project->scenarios()->each(function ($scenario) {
            $scenario->case()->each(function ($case) {
                $case->step()->delete();
            });
        });
    }

    public function update()
    {
        $this->validate();

        $this->project->update([
            'scenario_name' => $this->scenario_name
        ]);
    }

    public function render()
    {
        return view('livewire.project.test-component');
    }
}
