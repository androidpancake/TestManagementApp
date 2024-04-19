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

        if ($project->scenarios()->exists()) {
            return view('project.scenario', compact('project'));
        } else {
            return back();
        }
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
        $project = Project::find($id);
        $scenarios = $request->input('scenario_name');
        $cases = $request->input('case');
        $testSteps = $request->input('test_step');
        $expectedResults = $request->input('expected_result');
        $categories = $request->input('category');
        $severities = $request->input('severity');

        // dd($testSteps);

        DB::beginTransaction();
        try {
            foreach ($project->scenarios as $sIndex => $scenario) {
                if (isset($scenarios[$sIndex])) {
                    // dd($scenario->scenario_name);
                    $scenario->scenario_name = $scenarios[$sIndex];
                    $scenario->save();
                }

                foreach ($scenario->case as $cIndex => $case) {
                    if (isset($cases[$cIndex])) {
                        $case->case = $cases[$cIndex];
                        $case->save();
                    }
                    foreach ($case->step as $stIndex => $step) {
                        if (isset($testSteps[$stIndex], $expectedResults[$stIndex], $categories[$stIndex], $severities[$stIndex])) {
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
            return redirect()->route('scenario.show', $project->id)->with('success', 'Project updated successfully');
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

    public function deleteScenario($id)
    {
        $project = Project::find($id);
        $project->scenarios->find($id)->delete();
    }
}
