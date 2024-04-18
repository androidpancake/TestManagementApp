<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\Attributes\On;

#[Lazy(isolate: false)]
class User extends Component
{
    public $user;
    public $editMode = false;

    public function create()
    {
        return redirect()->route('user.create');
    }

    public function edit()
    {
        $this->dispatch('edit');
    }

    public function render()
    {
        return view('livewire.users.user', [
            'title' => 'User List',
            'description' => 'List of user joined to test',
        ]);
    }
}
