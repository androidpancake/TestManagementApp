<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $users = [];

    public $name;
    public $unit;
    public $department;
    public $username;
    public $password;

    public function mount()
    {
        $this->name;
        $this->unit;
        $this->department;
        $this->username;
        $this->password;
    }

    public function addUser()
    {
        $this->users[] = [
            'name',
            'unit',
            'department',
            'username',
            'password'
        ];
    }

    public function removeUser($index)
    {
        unset($this->users[$index]);
        $this->users = array_values($this->users);
    }

    public function validateForm()
    {
        $this->validate([
            'users.*.name' => 'required',
            'users.*.unit' => 'required',
            'users.*.department' => 'required',
            'users.*.username' => 'required',
            'users.*.password' => 'required'
        ]);
    }

    public function store()
    {
        $this->validateForm();

        if (is_array($this->users)) {
            foreach ($this->users as $index => $user) {
                User::create([
                    'name' => $user['name'][$index],
                    'unit' => $user['unit'][$index],
                    'department' => $user['department'][$index],
                    'username' => $user['username'][$index],
                    'password' => $user['password'][$index]
                ]);
            }
        }

        // dd($this->users);
    }

    public function render()
    {
        return view('livewire.users.create');
    }
}
