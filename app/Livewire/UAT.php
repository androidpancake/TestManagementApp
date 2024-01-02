<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class UAT extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = Project::where('test_level', 'UAT')->get();
        // dd($this->sitdata);
    }
    public function render()
    {
        return view('livewire.uat.uat', [
            'title' => 'UAT',
            'projects' => $this->projects
        ]);
    }
}
