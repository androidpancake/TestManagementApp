<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class customButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $value;
    public $type;
    public $params;
    public $class;

    public function __construct()
    {
        $this->value;
        $this->type;
        $this->params;
        $this->class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-button');
    }
}
