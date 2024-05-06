<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\Scenario;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class ScenarioComponent extends Component
{
    public $project;
    public $data;

    // field
    public $id;
    public $scenario_name;
    public $case;
    public $test_step;
    public $test_step_id;
    public $expected_result;
    public $category;
    public $severity;

    public function mount($id)
    {
        $this->project = Project::with(['test_level', 'members', 'issue', 'scenarios.cases.step'])->findOrFail($id);
        $this->id = $this->project;
    }

    protected $rules = [];

    protected $message = [];

    public function render()
    {
        return view('livewire.project.scenario-component');
    }

    public function updateTest()
    {
        $data = $this->validate();
        dd($data);
    }
}
