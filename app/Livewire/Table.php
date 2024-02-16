<?php

namespace App\Livewire;

use Livewire\Component;

abstract class Table extends Component
{
    public abstract function query(): \Illuminate\Database\Eloquent\Builder;
    public abstract function columns(): array;

    public function data()
    {
        return $this->query()->get();
    }

    public function render()
    {
        return view('livewire.table');
    }
}
