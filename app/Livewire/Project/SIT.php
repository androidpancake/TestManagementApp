<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class SIT extends Component
{
    public $projects;
    public $desc;

    public function mount()
    {
        $this->projects = Project::with(['test_level'])->whereHas('test_level', function ($query) {
            $query->where('type', 'SIT');
        })->get();

        $this->desc = $this->projects->pluck('test_level.description')->implode(' ');
    }

    public function render()
    {
        return view('livewire.sit.sit', [
            'title' => 'SIT',
            'description' => $this->desc
        ]);
    }
}
