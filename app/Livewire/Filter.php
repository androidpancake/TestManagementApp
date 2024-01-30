<?php

namespace App\Livewire;

use Livewire\Component;

class Filter extends Component
{
    public $datas;

    public function mount()
    {
        $this->datas;
    }
    public function render()
    {
        return view('livewire.filter', [
            'datas' => $this->datas
        ]);
    }
}
