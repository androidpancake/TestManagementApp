<?php

namespace App\Livewire;

use App\Models\Draft;
use Livewire\Component;

class DetailDraft extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Draft::with(['test_level'])->findOrFail($id);

        // dd($this->project);
    }

    public function render()
    {
        return view('livewire.draft.detail-draft')->with([
            'title' => 'Project Draft',
            'description' => $this->project['values']['project']['name']
        ]);
    }
}
