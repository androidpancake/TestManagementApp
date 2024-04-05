<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('livewire.users.edit');
    }
}
