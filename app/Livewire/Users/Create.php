<?php

namespace App\Livewire\Users;

use Livewire\Component;

class Create extends Component
{
    public $users = [];

    public function addUser()
    {
        $this->users[] = [
            'name',
            'unit',
            'department',
            'username'
        ];
    }
    
    public function render()
    {
        return view('livewire.users.create');
    }
}
