<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

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
        $body = request()->all();
        $chosenFilterList = [];
        foreach ($body as $filter_name => $filter_value) {
            //欄位名稱
            $column = str_replace("filter_", "", $filter_name);
            //樣板
            foreach ($this->model->filterTemplate as $useTemplateFilter => $set) {
                $title = '';
                if (is_array($set)) {
                    $template = $set['type'];
                    $title = $set['title'] ?? '';
                } else {
                    $template = $set;
                }

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
                                "title" => $title ?: $this->model->Column_Title_Text[$column] ?? "",
                                "titleValue" => isset($Model->{$column . "Text"}) ? $this->model->{$column . "Text"}[$filter_value_sub] : $filter_value_sub,
                            ];
                        }
                    }
                } elseif ($template == "checkbox" && is_array($filter_value)) {
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
                } elseif (
                    $template == "selectAndInput" && ($filter_name == 'filter_' . $useTemplateFilter . '_type') &&
                    array_key_exists($filter_value, [1, 2, 3])
                ) {
                    $value = $body['filter_' . $useTemplateFilter . '_value'];
                    $typeDict = [
                        1 => '小於',
                        2 => '等於',
                        3 => '大於',
                    ];
                    $chosenFilterList[] = [
                        "key" => $filter_name,
                        "value" => $filter_value,
                        "title" => $this->model->Column_Title_Text[$useTemplateFilter] ?? "",
                        "titleValue" => $typeDict[$filter_value] . $value,
                    ];
                } else if ($template == "rangeDateTime" && $column == $useTemplateFilter . "_start") {
                    $chosenFilterList[] = [
                        "key" => $filter_name,
                        "value" => $filter_value,
                        "title" => $useTemplateFilter,
                        "titleValue" => Carbon::parse($filter_value)->format('Y-m-d H:i:s') . __("起"),
                    ];
                } elseif ($template == "rangeDateTime" && $column == $useTemplateFilter . "_end") {
                    $chosenFilterList[] = [
                        "key" => $filter_name,
                        "value" => $filter_value,
                        "title" => $useTemplateFilter,
                        "titleValue" => Carbon::parse($filter_value)->format('Y-m-d H:i:s') . __("迄"),
                    ];
                }
            }
        }
        //
        return view('operate.components_view.filter.chosen', ["chosenFilterList" => $chosenFilterList,]);
    }
}
