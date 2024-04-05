<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy(isolate: false)]
class UserList extends Component
{
    use WithPagination;

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

    public function edit($name)
    {
    }

    public function render()
    {
        $users = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'USER');
        })->paginate(10);
        
        return view('livewire.users.index', compact('users'));
    }
}
