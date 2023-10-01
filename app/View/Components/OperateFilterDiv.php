<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OperateFilterDiv extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $column,public $model,public $type){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('operate.components_view.filter.div');
    }
}
