<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;

class Sidebar extends Component
{
    public function menuItem($data)
    {
        $this->emit('menuItem', $data);
    }
    public function render()
    {
        return view('livewire.sidebar.sidebar');
    }
}
