<?php

namespace App\View\Components\auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public string $type;
    public string $name;
    public string $placeholder;
    public string $label;
    public string $value;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $name, $label, $placeholder, $value="")
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth..input');
    }
}
