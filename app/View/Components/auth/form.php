<?php

namespace App\View\Components\auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    public string $method;
    public string $action;

    /**
     * Create a new component instance.
     */
    public function __construct($method, $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth..form');
    }
}
