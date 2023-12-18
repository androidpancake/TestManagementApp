<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();

        return view('project.index', [
            'project' => $project
        ])->with([
            'title' => 'Project',
            'description' => 'List of Projects'
        ]);
    }
}
