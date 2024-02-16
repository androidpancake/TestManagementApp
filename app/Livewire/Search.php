<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Search extends Component
{

    public function search()
    {
        $searchTerm = '';
        $this->emit('searchPerformed', $searchTerm);
    }
    public function render()
    {
        return view('livewire.search');
    }
}
