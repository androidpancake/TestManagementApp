<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class SIT extends Component
{
    public $projects;
    public $desc;

    public function render()
    {
        return view('livewire.sit.sit', [
            'title' => 'SIT',
        ])->with(['description' => $this->desc]);
    }
}
