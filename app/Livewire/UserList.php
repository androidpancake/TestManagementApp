<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

#[Lazy(isolate: false)]
class UserList extends Component
{
    use WithPagination;

    #[Locked]
    public $user_id;
    public $name;
    public $username;
    public $unit;

    public $editMode = false;
    public $user;

    public function placeholder()
    {
        return <<<'HTML'
        <div>
            <div role="status" class="max-w-sm animate-pulse">
                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[330px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[300px] mb-2.5"></div>
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        HTML;
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->unit = $user->unit;
        $this->editMode = true;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'unit' => 'required'
        ]);

        $user = User::find($this->user_id);
        $user->update([
            'username' => $this->username,
            'unit' => $this->unit
        ]);

        $this->editMode = false;
    }

    public function cancel()
    {
        $this->editMode = false;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
    }

    public function render()
    {
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'USER');
        })->paginate(10);

        return view('livewire.users.index', [
            'users' => $users
        ]);
    }
}
