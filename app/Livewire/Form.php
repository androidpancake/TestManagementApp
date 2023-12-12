<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $test_lv_value;
    public $currentStep = 1;
    public $total_steps = 6;
    public $name;
    public $jira_code;
    public $test_level;
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->test_lv_value = "Business Functionality";
        $this->render();
    }

    public function render()
    {
        return view('livewire.form')->with([
            'title' => 'Test',
            'description' => 'tes description'
        ]);
    }

    public function incrementSteps()
    {
        $this->validateForm();
        if ($this->currentStep < $this->total_steps) {
            $this->currentStep++;
        }
    }

    public function decrementSteps()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        $validated = $this->validate([
            'name' => 'required',
            'jira_code' => 'required',
            'test_level' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        /*
        Register::create([
            'first_name'=>$this->first_name;
        ])
        */
        //dd('form submitted');
        $this->reset();
    }

    public function validateForm()
    {
        if ($this->currentStep === 1) {
            $validated = $this->validate([
                'name' => 'required',
                'jira_code' => 'required',
                'test_level' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]);
        } elseif ($this->currentStep === 2) {
            $validated = $this->validate([
                'name' => 'required|email|max:255',
                'phone' => 'required|min:10',
            ]);
        }
    }
}
