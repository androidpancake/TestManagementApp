<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScenarioRequest;
use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use App\Models\TestStep;
use Exception;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::with('scenarios.case.step')->findOrFail($id);
        $scenarios = Scenario::with('case.step')->where('project_id', $project->id);
        // dd($project);
        return view('project.scenario', compact(['project']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'scenario_name.*' => 'required',
            'case.*' => 'required',
            'test_step_id.*' => 'required',
            'test_step.*' => 'required',
            'expected_result.*' => 'required',
            'category.*' => 'required',
            'severity.*' => 'required',
        ]);

        // Retrieve the project
        $project = Project::findOrFail($id);

        // Update scenarios and related cases and steps
        foreach ($validatedData['scenario_name'] as $sIndex => $scenarioName) {
            $scenario = $project->scenarios()->where('scenario_name', $scenarioName)->firstOrFail();
            $scenario->update(['scenario_name' => $scenarioName]);

            // Iterate through cases and steps
            foreach ($validatedData['case'][$sIndex] as $cIndex => $caseData) {
                // Find or create case
                $case = $scenario->cases()->firstOrCreate(['case' => $caseData]);

                // Iterate through steps
                foreach ($caseData['test_step_id'] as $stIndex => $testStepId) {
                    // Find or create step
                    $step = $case->steps()->firstOrCreate(['test_step_id' => $testStepId]);

                    // Update step data
                    $step->update([
                        'test_step' => $caseData['test_step'][$stIndex],
                        'expected_result' => $caseData['expected_result'][$stIndex],
                        'category' => $caseData['category'][$stIndex],
                        'severity' => $caseData['severity'][$stIndex],
                    ]);
                }
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Scenarios updated successfully');
        // $data = $request->all();
        // dd($data);
        // // dd($request->scenario);
        // $project = Project::find($id);

        // $scenarios_data = [];
        // foreach ($request->scenario_name as $sIndex => $scenario) {
        //     $project->scenarios()->update([
        //         $scenarios_data[] = [
        //             'scenario_name' => $sIndex['scenario_name']
        //         ]
        //     ]);
        // }

        // dd($request['scenario_name']);
        // $project->scenarios->case()->update([
        //     'case' => $data['case']
        // ]);

        // $project->scenarios->case->step->save([
        //     $request['test_step_id'],
        //     $request['test_step'],
        //     $request['expected_result'],
        //     $request['category'],
        //     $request['severity']
        // ]);

        // return redirect()->route('scenario.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
