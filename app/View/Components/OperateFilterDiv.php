<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OperateFilterDiv extends Component
{

    public $template;
    public $columnName;
    /**
     * Create a new component instance.
     */
    public function __construct(public $column, public $model, public $setting)
    {
        $this->columnName = $model->Column_Title_Text[$column] ?? $column;
        if (is_array($setting)) {
            $this->template = $setting['type'];
            $this->columnName = $setting['title'] ?? $column;
        } else {
            $this->template = $setting;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('operate.components_view.filter.div');
    }
}
