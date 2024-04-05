<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy(isolate: false)]
class User extends Component
{
    public $users;

    public function mount()
    {
        $this->users = ModelsUser::whereHas('roles', function ($query) {
            $query->where('name', 'USER');
        })->get();

        // dd($this->users);
    }

    public function redirect_add_user()
    {
        return redirect()->route('user.create');
    }

    public function render()
    {
        return view('livewire.users.user', [
            'title' => 'User List',
            'description' => 'List of user joined to test',
        ]);
    }
}
