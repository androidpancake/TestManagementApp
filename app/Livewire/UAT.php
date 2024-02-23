<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class UAT extends Component
{
    public $projects;
    public $desc;

    public function mount()
    {
        $this->projects = Project::with(['test_level'])->whereHas('test_level', function ($query) {
            $query->where('type', 'UAT');
        })->get();

        $this->desc =  $this->projects->pluck('test_level.description')->implode(' ');
    }
    public function render()
    {
        return view('livewire.uat.uat', [
            'title' => 'UAT',
            'projects' => $this->projects,
        ])->with(['description' => $this->desc]);
    }
}
