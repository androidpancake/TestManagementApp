<?php

namespace App\Livewire\Head;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Head extends Component
{
    public $title;
    public $description;
    public $user_name;

    public function render()
    {
        return view('livewire.head.head', [
            'user_name' => Auth::user()->name
        ]);
    }
}
