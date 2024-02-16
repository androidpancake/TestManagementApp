<?php

namespace App\Livewire;

use Livewire\Component;

class Data extends Component
{
    public $key;
    public string $label;

    public function __construct($key, $label)
    {
        $this->key = $key;
        $this->label = $label;
    }
    public function render()
    {
        return view('livewire.data');
    }
}
