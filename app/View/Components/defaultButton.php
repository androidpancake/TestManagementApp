<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class defaultButton extends Component
{
    /**
     * Create a new component instance.
     */

    public $value;
    public $type;
    public $params;

    public function __construct($value, $type, $params)
    {
        $this->value = $value;
        $this->type = $type;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.default-button');
    }
}
