<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class OperateTh extends Component
{
    public string $className="";
    /**
     * Create a new component instance.
     */
    public function __construct(public $column,public $model)
    {
        $this->className = app(\App\Tools\View\Operate\SortClass::class)->className("id");
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('operate.components.list.th');
    }
}
