<?php

namespace App\Livewire\Form;

use App\Models\Issue;
use App\Models\Members;
use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use App\Models\TestStep;
use Illuminate\Http\Request;
use Livewire\Component;

class Form extends Component
{
    // view
    public $i = 0;

    public $currentStep = 1;
    public $total_steps = 7;
    public $title;
    public $description;

    // data variable
    public $project;
    public $members;
    public $sceneData;

    // variable
    public $scenarioView = false;

    //field
    public $name;
    public $jira_code;
    public $test_level_id;
    public $test_type;
    public $start_date;
    public $end_date;
    public $desc;
    public $scope;
    public $env;
    public $sat_process;
    public $issues;
    public $issue;
    public $status;
    public $closed_date;
    public $published;

    public $credentials;
    public $retesting;
    public $other_notes;
    public $user_name;
    public $unit;
    public $telephone;
    public $project_id;
    public $test_lv;
    public $is_generated;
    public $test_step_id;
    public $test_step;
    public $case_id;
    public $test_id;

    public $users;

    public $scenarios;
    public $recentScenario;
    public $cases;
    public $recentCases;
    public $steps;
    public $recentSteps;
    public $scenario_name;
    public $case;
    public $expected_result;
    public $tmp;
    public $tmp_remark;
    public $updated_uat;
    public $updated_remark;
    public $uat_result;
    public $uat_remark;
    public $uat_attendance;
    public $uat_attendance_remark;
    public $other;
    public $other_remark;
    public $category;
    public $severity;
    public $test_status;

    public function mount($id)
    {
        // data
        $this->project = Project::with(['test_level', 'members', 'issue', 'scenarios.cases.step'])->findOrFail($id);
        $this->members = Members::where('project_id', $this->project->id)->get();
        $this->issues = $this->project->issue;

        foreach ($this->project->scenarios as $scenario) {
            $totalStep = 0;
            foreach ($scenario->cases as $testcase) {
                $totalStep += $testcase->step->count();
            }
            // dd($totalStep);
        }

        // view
        $this->title = $this->project->test_level->type . ' Report';
        $this->description = 'Please complete to generate ' . $this->project->test_level->description . ' Report';

        // field input
        $this->name = $this->project->name;
        $this->jira_code = $this->project->jira_code;
        $this->test_level_id = $this->project->test_level_id;
        $this->test_type = 'Business Functionality';
        $this->start_date = $this->project->start_date;
        $this->end_date = $this->project->end_date;
        $this->desc = $this->project->desc;
        $this->scope = $this->project->scope;
        $this->env = $this->project->env;
        $this->sat_process = $this->project->sat_process;
        $this->credentials = $this->project->credentials;
        $this->retesting = $this->project->retesting;
        $this->tmp = $this->project->tmp;
        $this->updated_uat = $this->project->updated_uat;
        $this->uat_result = $this->project->uat_result;
        $this->uat_attendance = $this->project->uat_attendance;
        $this->tmp_remark = $this->project->tmp_remark;
        $this->updated_remark = $this->project->updated_remark;
        $this->uat_remark = $this->project->uat_remark;
        $this->uat_attendance_remark = $this->project->uat_attendance_remark;
        $this->other = $this->project->other;
        $this->other_remark = $this->project->other_remark;

        $this->issue = [];

        $this->users = [];
        $this->user_name;
        $this->unit;
        $this->telephone;

        $this->scenarios = [];
        $this->recentScenario = [];
        $this->scenario_name;

        $this->cases = [];
        $this->recentCases;
        $this->case;

        $this->steps = [];
        $this->recentSteps;
        $this->test_step;
        $this->test_step_id;
        $this->expected_result;
        $this->category;
        $this->severity;
        $this->test_status;

        $this->published;
        $this->is_generated = 'Not Generated';
    }

    public function render()
    {
        return view('livewire.form.form')->with([
            'issues' => $this->project->issue,
            'project' => $this->project,
            'members' => $this->members,
            'description' => $this->description
        ]);
    }

    public function temporary()
    {
        //project
        session()->put('name', $this->name);
        session()->put('jira_code', $this->jira_code);
        session()->put('test_level_id', $this->test_level_id);
        session()->put('test_type', $this->name);
        session()->put('start_date', $this->start_date);
        session()->put('end_date', $this->end_date);
        session()->put('desc', $this->desc);
        session()->put('scope', $this->scope);
        session()->put('env', $this->env);
        session()->put('credentials', $this->credentials);
        session()->put('other', $this->other);
        session()->put('sat_process', $this->sat_process);
        session()->put('retesting', $this->retesting);
        session()->put('tmp', $this->tmp);
        session()->put('updated_uat', $this->updated_uat);
        session()->put('uat_attendance', $this->uat_attendance);
        session()->put('uat_result', $this->uat_result);
        session()->put('other', $this->other);

        // issue
        if (is_array($this->issue)) {
            foreach ($this->issue as $issue) {
                session()->put([
                    'issue.*.project_id' => session('project_id'),
                    'issue.*.issue' => $issue['issue'],
                    'issue.*.closed_date' => $issue['closed_date'],
                    'issue.*.status' => $issue['status']
                ]);
            }
        }

        //members
        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                session()->put([
                    'users.*.project_id' => session('project_id'),
                    'users.*.user_name' => $user['user_name'],
                    'users.*.unit' => $user['unit'],
                    'users.*.group' => $user['group'] ?? '',
                    'users.*.telephone' => $user['telephone']
                ]);
            }
        }

        //scenario
        if (is_array($this->scenarios)) {
            foreach ($this->scenarios as $scenario) {

                session()->put(['scenario' => $scenario['scenario_name']]);

                //cases
                if (is_array($this->cases)) {
                    foreach ($this->cases as $case) {
                        session()->put([
                            'scenarios.*.cases.*.case' => $case['case'],
                        ]);
                    }

                    //step
                    if (is_array($this->steps)) {
                        foreach ($this->steps as $step) {
                            session()->push('steps', [
                                'scenarios.*.cases.*.steps.*.test_step_id' => $step['test_step_id'],
                                'scenarios.*.cases.*.steps.*.test_step' => $step['test_step'],
                                'scenarios.*.cases.*.steps.*.expected_result' => $step['expected_result'],
                                'scenarios.*.cases.*.steps.*.category' => $step['category'],
                                'scenarios.*.cases.*.steps.*.severity' => $step['severity'],
                                'scenarios.*.cases.*.steps.*.status' => $step['status'],
                            ]);

                            // dd($this->steps);
                        }
                    }
                }
            }
        }

        // recentTest


        $this->update_data();
    }

    public function update_data()
    {
        $this->validateForm();
        // dd($data);
        $this->project->update([
            'name' => $this->name,
            'jira_code' => $this->jira_code,
            'test_level_id' => $this->test_level_id,
            'test_type' => $this->test_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'desc' => $this->desc,
            'scope' => $this->scope,
            'env' => $this->env,
            'credentials' => $this->credentials,
            'sat_process' => $this->sat_process,
            'retesting' => $this->retesting,
            'other_notes' => $this->other,
            'is_generated' => $this->is_generated,
            'tmp' => $this->tmp,
            'updated_uat' => $this->updated_uat,
            'uat_attendance' => $this->uat_attendance,
            'uat_result' => $this->uat_result,
            'other' => $this->other,
            'tmp_remark' => $this->tmp_remark,
            'updated_remark' => $this->updated_remark,
            'uat_remark' => $this->uat_remark,
            'uat_attendance_remark' => $this->uat_attendance_remark,
            'other_remark' => $this->other_remark,
        ]);

        if (is_array($this->issue)) {
            foreach ($this->issue as $issue) {
                Issue::updateOrCreate([
                    'project_id' => $this->project->id,
                    'issue' => $issue['issue'],
                    'status' => $issue['status'],
                    'closed_date' => $issue['closed_date']
                ]);
            }
        }

        if (is_array($this->users)) {
            foreach ($this->users as $user) {
                Members::updateOrCreate([
                    'project_id' => $this->project->id,
                    'user_name' => $user['user_name'],
                    'unit' => $user['unit'],
                    'group' => $user['group'] ?? '',
                    'telephone' => $user['telephone']
                ]);
            }
        }

        if (is_array($this->recentScenario)) {
            // dd($this->recentScenario);
            foreach ($this->recentScenario as $rScenario) {
                // scenario
                $eScenario = Scenario::where('project_id', $this->project->id)
                    ->where('scenario_name', $rScenario['scenario_name'])
                    ->first();

                if ($eScenario) {
                    $eScenario->update([
                        'scenario_name' => $rScenario['scenario_name']
                    ]);
                }
            }
        }

        if (is_array($this->scenarios)) {
            // dd($this->scenarios);
            foreach ($this->scenarios as $scene) {
                $newScenario = Scenario::updateOrCreate([
                    'project_id' => $this->project->id,
                    'scenario_name' => $scene['scenario_name'],
                ]);

                // dd($newScenario);

                // session(['test_id' => $newScenario->id]);
                if (is_array($this->cases)) {
                    foreach ($scene['cases'] as $case) {
                        // dd($case);

                        $newCase = $newScenario->cases()->updateOrCreate([
                            'case' => $case['case'],
                            'test_id' => $newScenario->id
                        ]);

                        // dd($newCase);

                        if (is_array($case['steps'])) {
                            foreach ($case['steps'] as $step) {
                                $newCase->step()->updateOrCreate([
                                    'test_step_id' => $step['test_step_id'],
                                    'test_step' => $step['test_step'],
                                    'expected_result' => $step['expected_result'],
                                    'category' => $step['category'],
                                    'severity' => $step['severity'],
                                    'status' => $step['status'],
                                    'case_id' => $newCase->id
                                ]);
                            }
                        }
                    }
                }
            }

            // dd($this->steps);
        }
    }

    public function toStep($step)
    {
        $this->update_data();

        $this->currentStep = $step;
    }

    public function incrementSteps()
    {
        $this->validateForm();

        if ($this->currentStep < $this->total_steps) {
            $this->currentStep++;
        }

        $this->temporary();
    }

    public function decrementSteps()
    {
        $this->validateForm();

        if ($this->currentStep > 1) {
            $this->currentStep--;
        }

        $this->temporary();
    }

    public function addMember()
    {
        $this->users[] = [
            'user_name' => '',
            'unit' => '',
            'group' => '',
            'telephone' => ''
        ];
    }

    public function removeMember($index)
    {
        unset($this->users[$index]);
        $this->users = array_values($this->users);
    }

    public function addIssue()
    {
        $this->issue[] = [
            'issue' => '',
            'closed_date' => '',
            'status' => ''
        ];
    }

    public function removeIssue($index)
    {
        unset($this->issue[$index]);
        $this->issue = array_values($this->issue);
    }

    public function deleteIssue($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
    }

    public function addScenario()
    {
        $this->scenarios[] = [
            'scenario_name',
            'cases' => []
        ];
    }

    public function removeScenario($scenarioIndex)
    {
        unset($this->scenarios[$scenarioIndex]);
        $this->scenarios = array_values($this->scenarios);
    }

    public function addTestCase($scenarioIndex)
    {
        $this->scenarios[$scenarioIndex]['cases'][] = [
            'case' => $this->case,
            'steps' => []
        ];
    }

    public function removeCase($scenarioIndex, $caseIndex)
    {
        if (isset($this->scenarios[$scenarioIndex]['cases'][$caseIndex])) {
            unset($this->scenarios[$scenarioIndex]['cases'][$caseIndex]);
            // Re-indexing jika perlu
            $this->scenarios[$scenarioIndex]['cases'] = array_values($this->scenarios[$scenarioIndex]['cases']);
        } else {
            // Handle the error when the specified indexes are invalid
        }
    }

    public function addTestStep($scenarioIndex, $caseIndex, Project $project, Scenario $scenario, TestCase $case)
    {
        $project = Project::where('id', $this->project->id)->first();
        $scenario = $scenario->with('cases')->where('project_id', $project->id)->first();
        if ($scenario) {
            $step = $scenario->steps()->count();
            $totalSteps = $step;
        } else {
            $totalSteps = 0;
        }

        foreach ($this->scenarios as $sIndex => $scenario) {
            foreach ($scenario['cases'] as $cIndex => $case) {
                if ($sIndex < $scenarioIndex || ($sIndex == $scenarioIndex && $cIndex <= $caseIndex)) {
                    $totalSteps += count($case['steps']);
                }
            }
        }
        $this->scenarios[$scenarioIndex]['cases'][$caseIndex]['steps'][] = [
            'test_step_id' => 'TS-' . ($totalSteps + 1),
            'test_step' => $this->test_step,
            'expected_result' => $this->expected_result,
            'category' => $this->category,
            'severity' => $this->severity,
            'status' => $this->test_status
        ];
    }

    public function removeStep($scenarioIndex, $caseIndex, $stepIndex)
    {
        if (isset($this->scenarios[$scenarioIndex]['cases'][$caseIndex]['steps'][$stepIndex])) {
            unset($this->scenarios[$scenarioIndex]['cases'][$caseIndex]['steps'][$stepIndex]);
            // Re-indexing jika perlu
            $this->scenarios[$scenarioIndex]['cases'][$caseIndex]['steps'] = array_values($this->scenarios[$scenarioIndex]['cases'][$caseIndex]['steps']);
        } else {
            // Handle the error when the specified indexes are invalid
        }
    }

    public function reset_test($scenarios)
    {
        unset($this->scenarios);
    }

    public function generate()
    {
        $this->update_data();
        return redirect()->route('generate', $this->project->id);
    }

    public function store()
    {
        $this->update_data();
        return redirect()->route('project');
    }

    public function deleteTest($id)
    {
        $scenario = Scenario::find($id);
        $scenario->each(function ($scenario) {
            $scenario->cases()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->cases()->delete();
        });

        $scenario->delete();
    }

    public function validateScenario()
    {
        $this->validate([
            'recentScenario.*.scenario_name' => 'required',
            // 'case.*' => 'required',
            // 'test_step.*' => 'required',
            // 'expected_result.*' => 'required',
            // 'category.*' => 'required',
            // 'severity.*' => 'required',
            // 'status.*' => 'required'
        ]);
    }

    public function validateForm()
    {
        $messages = [
            'name.required' => 'Nama project wajib diisi',
            'jira_code.required' => 'Jira code wajib diisi',
            'test_type.required' => 'Tipe tes wajib diisi',
            'test_level_id.required' => 'Wajib memilih tipe tes',
            'start_date.required' => 'Wajib mengisi tanggal mulai',
            'end_date.required' => 'Wajib mengisi tanggal akhir',
            'desc.required' => 'Wajib mengisi deskripsi',
            'scope.required' => 'Wajib mengisi scope',
            'env.required' => 'Wajib mengisi environment',
            'users.*.user_name.required' => 'Nama wajib diisi',
            'users.*.unit.required' => 'Wajib diisi',
            'users.*.telephone.required' => 'Wajib diisi',
            'users.*.telephone.min' => 'Minimal 9 angka',
            'users.*.telephone.max' => 'Maksimal 12 angka',
            'scenarios.*.scenario_name' => 'Wajib diisi',
            'scenarios.*.cases.*.case' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.test_step_id' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.test_step' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.expected_result' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.category' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.severity' => 'Wajib diisi',
            'scenarios.*.cases.*.steps.*.status' => 'Wajib diisi',
            'tmp.required' => 'Wajib diisi',
            'updated_uat.required' => 'Wajib diisi',
            'uat_result.required' => 'Wajib diisi',
            'uat_attendance.required' => 'Wajib diisi',
            'other.required' => 'Wajib diisi',
            'tmp_remark.required' => 'Wajib diisi',
            'updated_remark.required' => 'Wajib diisi',
            'uat_remark.required' => 'Wajib diisi',
            'uat_attendance_remark.required' => 'Wajib diisi',
            'other_remark.required' => 'Wajib diisi',
        ];

        if ($this->currentStep === 1) {
            $validated = $this->validate([
                'name' => 'required',
                'jira_code' => 'required',
                'test_type' => 'required',
                'test_level_id' => 'required',
                'start_date' => 'required|date|before_or_equal:end_date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);
        } elseif ($this->currentStep === 2) {
            $validated = $this->validate([
                'desc' => 'required',
                'scope' => 'required',
            ]);
        } elseif ($this->currentStep === 3) {
            $validated = $this->validate([
                'env' => 'required',
                'credentials' => 'nullable',
                'other_notes' => 'nullable'
            ]);
        } elseif ($this->currentStep === 4) {
            $validated = $this->validate([
                'issue.*.issue' => 'nullable',
                'issue.*.closed_date' => 'nullable',
                'issue.*.status' => 'nullable',
            ]);
        } elseif ($this->currentStep === 5) {
            $validated = $this->validate([
                'users.*.user_name' => 'required',
                'users.*.unit' => 'required',
                'users.*.group' => 'nullable',
                'users.*.telephone' => 'nullable|min:9|max:12',
            ], $messages);
        } elseif ($this->currentStep === 6) {
            $validated = $this->validate([
                'scenarios.*.scenario_name' => 'required',
                'scenarios.*.cases.*.case' => 'required',
                'scenarios.*.cases.*.steps.*.test_step_id' => 'required',
                'scenarios.*.cases.*.steps.*.test_step' => 'required',
                'scenarios.*.cases.*.steps.*.expected_result' => 'required',
                'scenarios.*.cases.*.steps.*.category' => 'required',
                'scenarios.*.cases.*.steps.*.severity' => 'required',
                'scenarios.*.cases.*.steps.*.status' => 'required'
            ], $messages);

            // dd($validated);
        } elseif ($this->currentStep === 7) {
            $validated = $this->validate([
                'tmp' => 'required',
                'updated_uat' => 'required',
                'uat_result' => 'required',
                'uat_attendance' => 'required',
                'other' => 'required',
                'tmp_remark' => 'nullable',
                'updated_remark' => 'nullable',
                'uat_remark' => 'nullable',
                'uat_attendance_remark' => 'nullable',
                'other_remark' => 'nullable',
            ]);
        }
    }

    public function scenarioView()
    {
        $this->scenarioView = true;
    }

    public function scenarioComponent()
    {
        return redirect()->route('scenario.show', $this->project->id);
    }
}
