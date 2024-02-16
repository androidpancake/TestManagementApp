<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class SIT extends Component
{
    public $projects;
    public $desc;

    public function mount()
    {
        $this->projects = Project::whereHas('test_level', function ($query) {
            $query->where('type', '=', 'SIT');
        })->get();

        // dd($projects);
        $this->desc = $this->projects->pluck('test_level.description')->unique()->implode(' ');

        // dd($this->desc);
    }
    public function render()
    {
        return view('livewire.sit.sit', [
            'title' => 'SIT',
            'projects' => $this->projects,

        ])->with(['description' => $this->desc]);
    }
}
