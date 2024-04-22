<?php

namespace App\Livewire\Sidebar;

use App\Models\Project;
use Livewire\Component;

class Sidebar extends Component
{
    public function menuItem($data)
    {
        $this->emit('menuItem', $data);
    }

    public function sit()
    {
        $data = Project::create([
            'user_id' => auth()->id(),
            'test_level_id' => 2,
            'published' => 'draft'
        ]);

        return redirect()->route('form', $data->id);
    }

    public function uat()
    {
        $data = Project::create([
            'user_id' => auth()->id(),
            'test_level_id' => 1,
            'published' => 'draft'

        ]);

        return redirect()->route('form', $data->id);
    }

    public function pir()
    {
        $data = Project::create([
            'user_id' => auth()->id(),
            'test_level_id' => 3,
            'published' => 'draft'

        ]);

        return redirect()->route('form', $data->id);
    }

    public function render()
    {
        return view('livewire.sidebar.sidebar');
    }
}
