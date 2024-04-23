<?php

namespace App\Livewire\Users;

use App\Models\Roles;
use App\Models\RolesUser;
use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $users = [];
    public $user;
    public $roles;
    public $name;
    public $unit;
    public $department;
    public $username;

    // variable
    public $modalEdit = false;

    public function mount()
    {
        $this->users;
        $this->roles = Roles::all();
        $this->name;
        $this->unit;
        $this->department;
        $this->username;
    }

    public function addUser()
    {
        $this->users[] = [
            'name',
            'unit',
            'department',
            'role',
            'username',
        ];
    }

    protected $rules = [
        'users.*.name' => 'required',
        'users.*.unit' => 'required',
        'users.*.department' => 'required',
        'users.*.role' => 'required',
        'users.*.username' => 'required|unique:users,username',
    ];

    protected $messages = [
        'users.*.name.required' => 'Nama wajib diisi',
        'users.*.unit.required' => 'Unit wajib diisi',
        'users.*.department.required' => 'Department wajib diisi',
        'users.*.role.required' => 'Role pengguna wajib diisi',
        'users.*.username.required' => 'Username wajib diisi',
        'users.*.username.unique' => 'Username sudah terdaftar',
    ];


    public function removeUser($index)
    {
        unset($this->users[$index]);
        $this->users = array_values($this->users);
    }

    public function store()
    {
        $this->validate();

        foreach ($this->users as $user) {
            $data = User::create([
                'unit' => $user['unit'],
                'name' => $user['name'],
                'department' => $user['department'],
                'username' => $user['username'],
            ]);
            RolesUser::create([
                'user_id' => $data->id,
                'roles_id' => $user['role']
            ]);
        }

        $this->users = [];

        // dd($this->users);
    }


    public function render()
    {
        return view('livewire.users.create');
    }
}
