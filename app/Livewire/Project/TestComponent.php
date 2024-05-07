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
    public $scenario_name = [];
    public $case;
    public $test_step_id;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        $this->projectId = $this->project->id;
        foreach ($this->project->scenarios as $sIndex => $scenario) {
            $this->scenario_name = $scenario->scenario_name;

            foreach ($scenario->cases as $cIndex => $case) {
                $this->case = $case->case;
            }

            foreach ($case->step as $stIndex => $step) {
                $this->test_step_id = $step->test_step_id;
            }
        }
    }

    public function deleteScenario($id)
    {
        $project = Project::find($id);
        $project->scenarios()->each(function ($scenario) {
            $scenario->cases()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->cases()->delete();
        });

        $project->scenarios()->delete();
    }

    public function update()
    {
        $this->validateForm();

        try {
            //code...
            foreach ($this->project->scenarios as $sIndex => $scenario) {

                $scenario->scenario_name = $this->scenario_name;
                $scenario->save();

                foreach ($scenario->cases as $cIndex => $case) {
                    $case->case = $this->case;
                    $case->save();

                    foreach ($case->step as $step) {
                        $step->test_step_id = $this->test_step_id;
                        $step->save();
                    }
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error updating data' . $th->getMessage());
        }
    }

    public function validateForm()
    {
        $this->validate([
            'scenario_name' => 'required'
        ]);
    }

    public function render()
    {
        return view('livewire.project.test-component');
    }
}
