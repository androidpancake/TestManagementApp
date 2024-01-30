<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class PIT extends Component
{
    public $projects;
    public $desc;

    public function mount()
    {
        $this->projects = Project::with(['test_level'])->whereHas('test_level', function ($query) {
            $query->where('type', 'PIR');
        })->get();

        $this->desc =  $this->projects->pluck('test_level.description')->implode(' ');
        // dd($this->desc);
    }

    public function render()
    {
        return view('livewire.pit.pit', ['projects' => $this->projects])->with(
            ['title' => 'PIR', 'description' => $this->desc]
        );
    }
}
