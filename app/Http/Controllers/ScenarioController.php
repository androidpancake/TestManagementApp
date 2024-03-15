<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScenarioRequest;
use App\Models\Project;
use App\Models\Scenario;
use App\Models\TestCase;
use App\Models\TestStep;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function update2(Request $request, $id)
    {
        $project = Project::find($id);
        $scenarios = Scenario::with('case.step')->where('project_id', $project->id);
        $data = $request->all();
        // dd($request->scenario_name);
        if ($request->scenario_name) {
            foreach ($data['scenario_name'] as $sIndex => $scenario) {
                $sc_id = $data['id'];
                // dd($sc_id);
                $sc_data = [
                    'scenario_name' => $data['scenario_name'][$sIndex]
                ];
                // dd($sc_data);
                $scenarios->where('id', $sc_id)->update($sc_data);
            }
            // dd($sc_data);
        }

        return redirect()->route('scenario.show', $project->id);
    }

    public function update(ScenarioRequest $request, $projectId)
    {
        $project = Project::find($projectId);
        $scenarios = $request->input('scenario_name');
        $cases = $request->input('case');
        $testSteps = $request->input('test_step');
        $expectedResults = $request->input('expected_result');
        $categories = $request->input('category');
        $severities = $request->input('severity');

        DB::beginTransaction();
        try {
            foreach ($project->scenarios as $sIndex => $scenario) {
                if (isset($scenarios[$sIndex])) {
                    $scenario->scenario_name = $scenarios[$sIndex];
                    $scenario->save();
                }

                foreach ($scenario->case as $cIndex => $case) {
                    if (isset($cases[$cIndex])) {
                        $case->case = $cases[$cIndex];
                        $case->save();
                    }

                    foreach ($case->step as $stIndex => $step) {
                        if (isset($testSteps[$stIndex])) {
                            $step->test_step = $testSteps[$stIndex];
                            $step->expected_result = $expectedResults[$stIndex];
                            $step->category = $categories[$stIndex];
                            $step->severity = $severities[$stIndex];
                            $step->save();
                        }
                    }
                }
            }
            DB::commit();
            return redirect()->route('your.route.name')->with('success', 'Project updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error updating project: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
