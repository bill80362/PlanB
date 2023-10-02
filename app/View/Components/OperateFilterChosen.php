<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OperateFilterChosen extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $model)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        //
        $chosenFilterList = [];
        foreach (request()->all() as $filter_name => $filter_value) {
            //欄位名稱
            $column = str_replace("filter_", "", $filter_name);
            //樣板
            foreach ($this->model->filterTemplate as $useTemplateFilter => $template) {
                if ($template == "rangeDate" && $column == $useTemplateFilter . "_start") {
                    $chosenFilterList[] = [
                        "key" => $filter_name,
                        "value" => $filter_value,
                        "title" => $useTemplateFilter,
                        "titleValue" => $filter_value . __("起"),
                    ];
                } elseif ($template == "rangeDate" && $column == $useTemplateFilter . "_end") {
                    $chosenFilterList[] = [
                        "key" => $filter_name,
                        "value" => $filter_value,
                        "title" => $useTemplateFilter,
                        "titleValue" => $filter_value . __("迄"),
                    ];
                } elseif ($template == "select2" && is_array($filter_value)) {
                    foreach ($filter_value as  $filter_value_sub) {
                        $chosenFilterList[] = [
                            "key" => $filter_name,
                            "value" => $filter_value_sub,
                            "title" => $this->model->Column_Title_Text[$column] ?? "",
                            "titleValue" => isset($Model->{$column . "Text"}) ? $this->model->{$column . "Text"}[$filter_value_sub] : $filter_value_sub,
                        ];
                    }
                } elseif ($template == "radio" && is_array($filter_value)) {
                    foreach ($filter_value as  $filter_value_sub) {
                        if ($filter_value_sub) {
                            $chosenFilterList[] = [
                                "key" => $filter_name,
                                "value" => $filter_value_sub,
                                "title" => $this->model->Column_Title_Text[$column] ?? "",
                                "titleValue" => isset($Model->{$column . "Text"}) ? $this->model->{$column . "Text"}[$filter_value_sub] : $filter_value_sub,
                            ];
                        }
                    }
                }
            }
        }
        //
        return view('operate.components_view.filter.chosen', ["chosenFilterList" => $chosenFilterList,]);
    }
}
