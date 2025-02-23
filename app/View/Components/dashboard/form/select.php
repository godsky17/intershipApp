<?php

namespace App\View\Components\dashboard\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{

    public $items = [];
    /**
     * Create a new component instance.
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard..form..select');
    }
}
