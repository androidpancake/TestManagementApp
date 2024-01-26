<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Dashboard extends Component
{
    public $sitData;
    public $uatData;
    public $chartData = [];
    public $labels;


    public function mount()
    {
        $this->sitData = Project::where('user_id', auth()->id())->where('test_level', '=', 'SIT')->count();
        $this->uatData = Project::where('user_id', auth()->id())->where('test_level', '=', 'UAT')->count();
        // $this->labels = Project::where('user_id', auth()->id())->select('test_level')->get();
        // dd($this->labels);

        $this->chartData = [
            'series' => [$this->sitData, $this->uatData],
            'labels' => ['SIT', 'UAT']
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
