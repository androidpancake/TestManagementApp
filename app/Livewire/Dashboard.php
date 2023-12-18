<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $title = 'Selamat Datang';
    public $desc = 'Halo, nama orang';

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function chart()
    {
        
    }
}
