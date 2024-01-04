<?php

namespace App\Livewire;

use App\Models\Members;
use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use App\Models\TestLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Form extends Component
{
    public $currentParent = 0;

    public $i = 0;
    public $users;
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
    public $scenarios = [];
    public $cases = [];
    public $steps = [];
    public $test_step_id;
    public $test_step;
    public $case_id;
    public $test_id;
    public $tmp;
    public $updated_uat;

    public $scenario_name;
    public $case;
    public $expected_result;
    public $uat_attendance;
    public $uat_result;
    public $remarks;
    public $category;
    public $severity;
    public $test_status;
    public $row;

    public $caseParentIndices;

    public function mount()
    {
        $this->caseParentIndices = [];
        $this->users = [];
        $this->row = [];
        $this->scenarios = [];
        $this->cases = [];
        $this->steps = [];
        $this->remarks = [];
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

    // public function render()
    // {

    //     return view('livewire.form')->with([
    //         'title' => 'SIT Form',
    //         'description' => 'Please complete the documents to generate reports'
    //     ]);
    // }

    public function render()
    {
        $route = request()->route()->getName();

        $title = 'Default Title';
        $description = 'Default Description';
        $select = '';

        // Check if the current route is 'sit/form'
        if ($route == 'sit.form') {
            $title = 'SIT Form';
            $select = 'SIT';
            $description = 'Please complete the documents to generate reports for SIT';
        }

        // Check if the current route is 'uat/form'
        if ($route == 'uat.form') {
            $title = 'UAT Form';
            $select = 'UAT';
            $description = 'Please complete the documents to generate reports for UAT';
        }

        return view('livewire.form')->with([
            'select' => $select,
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function incrementSteps()
    {
        $this->validateForm();

        if ($this->currentStep < $this->total_steps) {
            $this->currentStep++;
        }

        $this->save_temporary_data();
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
    }

    public function removeUser($index)
    {
        unset($this->users[$index]);
        $this->users = array_values($this->users);
    }

    public function save_temporary_data()
    {
        //project
        session()->put('name', $this->name);
        session()->put('jira_code', $this->jira_code);
        session()->put('test_level', $this->test_level);
        session()->put('test_type', $this->name);
        session()->put('start_date', $this->start_date);
        session()->put('end_date', $this->end_date);
        session()->put('desc', $this->desc);
        session()->put('scope', $this->scope);
        session()->put('env', $this->env);
        session()->put('issue', $this->issue);
        session()->put('credentials', $this->credentials);
        session()->put('other', $this->other);
        session()->put('sat_process', $this->sat_process);
        session()->put('retesting', $this->retesting);
        session()->put('tmp', $this->tmp);
        session()->put('updated_uat', $this->updated_uat);
        session()->put('uat_attendance', $this->uat_attendance);
        session()->put('uat_result', $this->uat_result);
        session()->put('other', $this->other);
        session()->put('remarks', $this->remarks);

        //members
        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                session()->put([
                    'users.*.project_id' => session('project_id'),
                    'users.*.user_name' => $user['user_name'],
                    'users.*.unit' => $user['unit'],
                    'users.*.telephone' => $user['telephone']
                ]);
            }
        }

        //sceneario
        if (is_array($this->scenarios)) {
            foreach ($this->scenarios as $scenario) {

                session()->put($this->scenario_name, $scenario['scenario_name']);
                
                //cases
                if (is_array($this->cases)) {
                    foreach ($this->cases as $case) {
                        session()->put([
                            'cases.*.case' => $case['case'],
                        ]);

                        // $caseId = $case->id;
                        // session()->put('case_id');
                    }

                    //step
                    if (is_array($this->steps)) {
                        foreach ($this->steps as $step) {
                            session()->push('steps', [
                                'steps.*.test_step_id' => $step['test_step_id'],
                                'steps.*.test_step' => $step['test_step'],
                                'steps.*.expected_result' => $step['expected_result'],
                                'steps.*.category' => $step['category'],
                                'steps.*.severity' => $step['severity'],
                                'steps.*.status' => $step['status'],
                            ]);

                            // dd($this->steps);
                        }
                    }
                }
            }
        }
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
            'status' => $this->status,
            'tmp' => $this->tmp,
            'updated_uat' => $this->updated_uat,
            'uat_attendance' => $this->uat_attendance,
            'uat_result' => $this->uat_result,
            // 'remarks' => $this->remarks,
        ]);

        // dd($project);

        session(['project_id' => $project->id]);

        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                Members::create([
                    'project_id' => session('project_id'),
                    'user_name' => $user['user_name'],
                    'unit' => $user['unit'],
                    'telephone' => $user['telephone']
                ]);
            }

            // dd($this->users);
        }

        if (is_array($this->scenarios)) {
            foreach ($this->scenarios as $scene) {

                $newScenario = Scenario::create([
                    'project_id' => session('project_id'),
                    'scenario_name' => $scene['scenario_name'],
                ]);

                session(['test_id' => $newScenario->id]);

                if (is_array($this->cases)) {
                    foreach ($this->cases as $case) {
                        $newCase = $newScenario->case()->create([
                            'case' => $case['case'],
                            'test_id' => session('test_id')
                        ]);

                        if (is_array($this->steps)) {
                            foreach ($this->steps as $step) {
                                $newCase->step()->create([
                                    'test_step_id' => $step['test_step_id'],
                                    'test_step' => $step['test_step'],
                                    'expected_result' => $step['expected_result'],
                                    'category' => $step['category'],
                                    'severity' => $step['severity'],
                                    'status' => $step['status'],
                                    'case_id' => session('case_id')
                                ]);
                            }
                        }
                    }
                }
            }

            // dd($this->steps);
        }

        return redirect()->route('project');
    }

    public function save_members()
    {
        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                Members::create([
                    'project_id' => session('project_id'),
                    'user_name' => $user['user_name'],
                    'unit' => $user['unit'],
                    'telephone' => $user['telephone']
                ]);
            }
        }

        // dd($this->users);

        return $this->incrementSteps();
    }

    public function addScenario()
    {
        $this->scenarios[] = [
            'scenario_name' => $this->scenario_name,
        ];

        // $this->scenario_name = '';
    }

    public function addTestCase()
    {
        $this->cases[] = [
            'case' => $this->case
        ];

        $this->case = '';
    }

    public function addTestStep()
    {
        $this->steps[] = [
            'test_step_id' => $this->test_step_id,
            'test_step' => $this->test_step,
            'expected_result' => $this->expected_result,
            'category' => $this->category,
            'severity' => $this->severity,
            'status' => $this->status
        ];

        $this->test_step_id = '';
        $this->test_step = '';
        $this->expected_result = '';
        $this->category = '';
        $this->severity = '';
        $this->status = '';
    }

    public function removeScenario($index)
    {
        unset($this->scenarios[$index]);
        $this->scenarios = array_values($this->scenarios);
    }

    public function removeCase($tc)
    {
        unset($this->cases[$tc]);
        $this->cases = array_values($this->cases);
    }

    public function removeStep($ts)
    {
        unset($this->steps[$ts]);
        $this->steps = array_values($this->steps);
    }

    public function save_test()
    {
        if (is_array($this->scenarios)) {
            foreach ($this->scenarios as $scene) {

                $newScenario = Scenario::create([
                    'project_id' => session('project_id'),
                    'scenario_name' => $scene['scenario_name'],
                ]);

                if (is_array($this->cases)) {
                    foreach ($this->cases as $case) {
                        $newScenario->case()->create([
                            'case' => $case['case']
                        ]);
                    }
                }
            }
        }

        return $this->incrementSteps();
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
                'users.*.user_name' => 'required',
                'users.*.unit' => 'required',
                'users.*.telephone' => 'required|numeric',
            ]);
        } elseif ($this->currentStep === 5) {
            $validated = $this->validate([
                'scenarios.*.scenario_name' => 'required',
                'cases.*.case' => 'required',
                'steps.*.test_step_id' => 'nullable',
                'steps.*.test_step' => 'nullable',
                'steps.*.expected_result' => 'nullable',
                'steps.*.category' => 'nullable',
                'steps.*.severity' => 'nullable',
                'steps.*.status' => 'nullable'
            ]);
        } elseif ($this->currentStep === 6) {
            $validated = $this->validate([
                'tmp' => 'required',
                'updated_uat' => 'required',
                'uat_result' => 'required',
                'uat_attendance' => 'required',
                'other' => 'required',
                'remarks' => 'nullable',
            ]);
        }
    }
}
