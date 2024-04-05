<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Dashboard extends Component
{
    public $sitData;
    public $uatData;
    public $pirData;
    public $chartData = [];
    public $labels;


    public function mount()
    {
        $this->sitData = Project::whereHas('test_level', function ($query) {
            $query->where('type', '=', 'SIT');
        })->count();

        $this->uatData = Project::whereHas('test_level', function ($query) {
            $query->where('type', '=', 'SIT');
        })->count();

        $this->pirData = Project::whereHas('test_level', function ($query) {
            $query->where('type', '=', 'PIR');
        })->count();

        // dd($this->sitData);

        $this->chartData = [
            'series' => [$this->sitData, $this->uatData, $this->pirData],
            'labels' => ['SIT', 'UAT', 'PIR']
        ];

        // dd($this->chartData);
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'chartData' => $this->chartData,
        ]);
    }
}
