<?php

namespace App\Livewire\Project;

use App\Models\Project;
use App\Models\TestLevel;
use Livewire\Component;

class PIT extends Component
{
    public $projects;
    public $title;
    public $desc;

    public function mount()
    {
        $this->projects = Project::with(['test_level'])->whereHas('test_level', function ($query) {
            $query->where('type', 'PIR');
        })->get();

        $record = TestLevel::where('type', 'PIR')->first();
        $this->title = $record->type;
        $this->desc = $record->description;

    }

    public function render()
    {
        return view('livewire.pit.pit')->with(
            [
                'title' => $this->title,
                'description' => $this->desc
            ]
        );
    }
}
