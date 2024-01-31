<?php

namespace App\Livewire;

use App\Models\Members;
use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use Livewire\Component;

class DetailProject extends Component
{
    public $project;
    public $members;
    public $scenarios;
    public $case;
    public $step;
    public $totalStep;

    public function mount($id)
    {
        $this->project = Project::with(['members', 'scenarios', 'issue'])->findOrFail($id);
        $this->scenarios = Scenario::with(['case.step'])->where('project_id', $this->project->id)->get();
        $this->members = Members::where('project_id', $this->project->id)->get();
        $this->totalStep;

        foreach ($this->scenarios as $scenario) {
            $totalStep = 0;
            foreach ($scenario->case as $testcase) {
                $totalStep += $testcase->step->count();
            }
            // dd($totalStep);
        }

        // dd($this->scenarios);

    }

    public function generate($id)
    {
        $this->project = Project::with(['members', 'scenarios'])->findOrFail($id);
        $this->scenarios = Scenario::with(['case.step'])->where('project_id', $this->project->id)->get();
        $this->members = Members::where('project_id', $this->project->id)->get();
        return redirect()->route('generate', $id);
    }

    public function render()
    {
        return view('livewire.project.detail-project')->with([
            'title' => $this->project->name,
            'description' => $this->project->desc,
            'project' => $this->project
        ]);
    }
}
