<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Scenario;
use Livewire\Component;

class ScenarioComponent extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Project::with(['test_level', 'members', 'issue', 'scenarios.case.step'])->findOrFail($id);
        $data = $this->project;
        // dd($this->project);
        // return $data;
    }

    public function update()
    {
        
    }

    public function render()
    {
        return view('livewire.project.scenario-component');
    }
}
