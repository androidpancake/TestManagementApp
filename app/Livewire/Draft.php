<?php

namespace App\Livewire;

use App\Models\Draft as ModelsDraft;
use App\Models\Project;
use Livewire\Component;

class Draft extends Component
{
    public $draft;

    public function mount()
    {
        $this->draft = Project::with(['test_level'])->where('published', 'draft')->get();
        // dd($this->draft);
    }

    public function detail()
    {
        return view('livewire.draft.detail');
    }

    public function render()
    {
        return view('livewire.draft', [
            'draft' => $this->draft,
        ]);
    }
}
