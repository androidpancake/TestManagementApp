<?php

namespace App\Livewire;

use App\Models\Members;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
    public $users = [];
    public $test_lv_value = "Business Functionality";
    public $currentStep = 1;
    public $total_steps = 6;
    public $name;
    public $jira_code;
    public $test_level;
    public $start_date;
    public $end_date;
    public $desc;
    public $scope;
    public $env;
    public $issue;
    public $credentials;
    public $other;
    public $user_name;
    public $unit;
    public $telephone;
    public $project_id;

    public function mount()
    {
        $this->project_id = DB::table('project')->latest('id')->first();
        $this->name = old('name');
        $this->jira_code = old('jira_code');
        $this->test_level = old('test_level');
        $this->start_date = old('start_date');
        $this->end_date = old('end_date');
        $this->desc = old('desc');
        $this->scope = old('scope');
        $this->issue = old('issue');
        $this->credentials = old('credentials');
        $this->other = old('others');
        $this->test_lv_value = $this->test_lv_value;
        $this->render();
    }

    public function render()
    {
        return view('livewire.form')->with([
            'title' => 'SIT Form',
            'description' => 'Please complete the documents to generate reports'
        ]);
    }

    public function incrementSteps()
    {
        $this->validateForm();
        if ($this->currentStep < $this->total_steps) {
            $this->currentStep++;
        }
    }

    public function decrementSteps()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function addUser()
    {
        $this->users[] = [
            'name' => '',
            'unit' => '',
            'telephone' => ''
        ];

        $this->render();
    }

    public function removeUser($index)
    {
        unset($this->users[$index]);
        $this->users = array_values($this->users);
        $this->render();
    }

    public function save_data_project()
    {
        Project::create([
            'name' => $this->name,
            'jira_code' => $this->jira_code,
            'test_level' => $this->test_level,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => auth()->id(),
            'desc' => $this->desc,
            'scope' => $this->scope,
            'issue' => $this->issue,
            'credentials' => $this->credentials,
            'env' => $this->env,
            'other' => $this->other
        ]);

        return $this->incrementSteps();
    }

    public function submit()
    {
        // $validated = $this->validate([
        //     'name' => 'required',
        //     'jira_code' => 'required',
        //     'test_level' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required'
        // ]);

        Members::create([
            'project_id' => $this->project_id + 1,
            'name' => $this->user_name,
            'unit' => $this->unit,
            'telephone' => $this->telephone
        ]);

        return redirect()->route('sit.index');
    }

    public function validateForm()
    {
        if ($this->currentStep === 1) {
            $validated = $this->validate([
                'name' => 'required',
                'jira_code' => 'required',
                'test_level' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]);
        } elseif ($this->currentStep === 2) {
            $validated = $this->validate([
                'desc' => 'required',
                'scope' => 'required',
            ]);
        } elseif ($this->currentStep === 3) {
            $validated = $this->validate([
                'env' => 'required',
                'issue' => 'required',
                'credentials' => 'required',
                'other' => 'nullable'
            ]);
        } elseif ($this->currentStep === 4) {
            $validated = $this->validate([
                'name' => 'required',
                'unit' => 'required',
                'telephone' => 'required',
                'project_id' => 'required'
            ]);
        } elseif ($this->currentStep === 5) {
            $validated = $this->validate([
                'scenario_name' => 'required',
                'project_id' => 'required',
            ]);
        }
    }
}
