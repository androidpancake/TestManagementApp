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

    public function getSearch(Request $request, $id)
    {
        $project = Project::with('scenarios.cases.step')->findOrFail($id);

        $scenarios = Scenario::whereHas('cases.step', function ($q) use ($request) {
            $q->where('scenario_name', 'like', '%' . $request->q . '%')
                ->orWhere('case', 'like', '%' . $request->q . '%')
                ->orWhere('test_step_id', 'like', '%' . $request->q . '%')
                ->orWhere('test_step', 'like', '%' . $request->q . '%');
        })->where('project_id', $project->id)->get();

        return response()->json(data: $scenarios, status: 200);
    }

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
    public function show(Request $request, $id)
    {
        $project = Project::with('scenarios.cases.step')->findOrFail($id);

        $scenarios = Scenario::whereHas('cases.step', function ($q) use ($request) {
            $q->where('scenario_name', 'like', '%' . $request->q . '%')
                ->orWhere('case', 'like', '%' . $request->q . '%')
                ->orWhere('test_step_id', 'like', '%' . $request->q . '%')
                ->orWhere('test_step', 'like', '%' . $request->q . '%');
        })->where('project_id', $project->id)->get();

        return view('project.scenario', compact('project', 'scenarios'));
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
        $data = $request->all();

        foreach ($data['scenarios'] as $scenarioData) {
            $scenarioId = $scenarioData['id'];
            $scenario = $project->scenarios()->findOrFail($scenarioId);
            $scenario->update($scenarioData);

            foreach ($scenarioData['cases'] as $caseData) {
                $caseId = $caseData['id'];
                $case = $scenario->cases()->findOrFail($caseId);
                $case->update(['case' => $caseData['cases']]);

                foreach ($caseData['steps'] as $stepData) {
                    $stepId = $stepData['id'];
                    $step = $case->step()->findOrFail($stepId);
                    $step->update($stepData);
                }
            }
        }

        return redirect()->back()->with('success', 'Success updating data');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        dd($project);
        $project->scenarios()->each(function ($scenario) {
            $scenario->case()->each(function ($case) {
                $case->step()->delete();
            });
            $scenario->case()->delete();
        });

        $project->scenarios()->delete();

        return redirect()->route('scenario.show', $project->id);
    }
}
