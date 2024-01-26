<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class SIT extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = Project::whereHas('test_level', function ($query) {
            $query->where('test_level_id', '=', 2);
        })->get();
        // dd($this->sitdata);
    }
    public function render()
    {
        return view('livewire.sit.sit', [
            'title' => 'SIT',
            'projects' => $this->projects
        ]);
    }
}
