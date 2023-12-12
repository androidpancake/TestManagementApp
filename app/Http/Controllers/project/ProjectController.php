<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index')->with([
            'title' => 'Project',
            'description' => 'List of Projects'
        ]);
    }
}
