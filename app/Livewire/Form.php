<?php

namespace App\Livewire;

use App\Models\Members;
use App\Models\Project;
use App\Models\TestLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Form extends Component
{
    public $users = [
        'user_name', 'unit', 'telephone'
    ];
    public $currentStep = 1;
    public $total_steps = 6;
    public $name;
    public $jira_code;
    public $test_level;
    public $test_type;
    public $start_date;
    public $end_date;
    public $desc;
    public $scope;
    public $env;
    public $sat_process;
    public $issue;
    public $credentials;
    public $retesting;
    public $other;
    public $user_name;
    public $unit;
    public $telephone;
    public $project_id;
    public $test_lv;
    public $status;


    public function mount()
    {
        $this->test_lv = TestLevel::all();
        $this->project_id;
        $this->name;
        $this->jira_code;
        $this->test_level;
        $this->test_type = 'Business Functionality';
        $this->start_date;
        $this->end_date;
        $this->desc;
        $this->scope;
        $this->env;
        $this->sat_process;
        $this->issue;
        $this->credentials;
        $this->retesting;
        $this->other;
        $this->user_name;
        $this->unit;
        $this->telephone;
        $this->status = 'Not Generated';
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
            'user_name' => '',
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
        $project = Project::create([
            'name' => $this->name,
            'jira_code' => $this->jira_code,
            'test_level' => $this->test_level,
            'test_type' => $this->test_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => auth()->id(),
            'desc' => $this->desc,
            'scope' => $this->scope,
            'issue' => $this->issue,
            'credentials' => $this->credentials,
            'env' => $this->env,
            'sat_process' => $this->sat_process,
            'retesting' => $this->retesting,
            'other' => $this->other,
            'status' => $this->status
        ]);

        session(['project_id' => $project->id]);

        return $this->incrementSteps();
    }

    public function save_members(Request $request)
    {
        // Log::info($user);
        $data = [];
        foreach ($this->users as $user) {
            $data[] = [
                'project_id' => session('project_id'),
                'user_name' => $this['user_name'],
                'unit' => $this['unit'],
                'telephone' => $this['telephone']
            ];
        }

        dd($data);
        Members::create($data);

        // dd($data);

        return $this->incrementSteps();
    }

    public function save_test()
    {
        //test logic
    }

    public function generate()
    {
        //generate word
    }

    public function validateForm()
    {
        if ($this->currentStep === 1) {
            $validated = $this->validate([
                'name' => 'required',
                'jira_code' => 'required',
                'test_type' => 'required',
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
                'retesting' => 'required',
                'other' => 'nullable'
            ]);
        } elseif ($this->currentStep === 4) {
            $validated = $this->validate([
                'users. * .user_name' => 'required',
                'users. * .unit' => 'required',
                'users. * .telephone' => 'required|numeric',
            ]);
        } elseif ($this->currentStep === 5) {
            $validated = $this->validate([
                'scenario_name' => 'required',
                'project_id' => 'required',
            ]);
        }
    }
}
