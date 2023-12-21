<?php

namespace App\Livewire;

use App\Models\Members;
use App\Models\Project;
use Livewire\Component;

class DetailProject extends Component
{
    public $project;
    public $members;

    public function mount($id)
    {
        $this->project = Project::findOrFail($id);
        $this->members = Members::where('project_id', $this->project->id)->get();
        // dd($this->members);
    }
    public function render()
    {
        return view('livewire.detail-project')->with([
            'title' => $this->project->name,
            'description' => $this->project->desc
        ]);
    }
}
