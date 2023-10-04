<?php

namespace App\Models;

/**
 * 後台操作 列表 匯出 篩選器
 * template 對應的地方:
 * 1.版面，修改位置 class OperateFilterDiv，主要負責讓使用者選擇篩選條件
 * 2.功能，修改位置 model，主要負責SQL篩選條件
 * 3.篩選器移除標籤，修改位置 chosen ，主要可以快速移除篩選條件
 */
trait FilterTemplateTrait
{
    /**
     * select2 多選
     */
    public function scopeFilter($query, array $Data)
    {
        // dd($Data);
        //過濾選項-使用樣板
        foreach ($this->filterTemplate as $filterName => $set) {
            $customQuery = false;
            if (is_array($set)) {
                $template = $set['template'];
                $customQuery = $set['customQuery'];
            } else {
                $template = $set;
            }

            if ($customQuery) continue;
            if (isset($Data['filter_' . $filterName]) && count(array_filter((array)$Data['filter_' . $filterName])) == 0) continue;

            if ($template == "select2" && isset($Data['filter_' . $filterName])) {
                $query->whereIn($filterName, (array)$Data['filter_' . $filterName]);
            } elseif ($template == "rangeDate" && isset($Data['filter_' . $filterName . '_end'])) {
                if (isset($Data['filter_' . $filterName . '_start'])) {
                    $query->where($filterName, ">=", $Data['filter_' . $filterName . '_start']);
                }
                if (isset($Data['filter_' . $filterName . '_end'])) {
                    $query->where($filterName, "<=", $Data['filter_' . $filterName . '_end']);
                }
            } else if ($template == "radio" && isset($Data['filter_' . $filterName])) {
                $query->whereIn($filterName, (array)$Data['filter_' . $filterName]);
            } else if ($template == "checkbox" && isset($Data['filter_' . $filterName])) {
                $query->whereIn($filterName, (array)$Data['filter_' . $filterName]);
            } else if (
                $template == "selectAndInput" &&
                isset($Data['filter_' . $filterName . "_type"]) &&
                array_key_exists($Data['filter_' . $filterName . "_type"], [1, 2, 3])
            ) {
                $type = $Data['filter_' . $filterName . '_type'];
                $typeDict = [
                    1 => '<',
                    2 => '=',
                    3 => '>',
                ];
                $query->where($filterName, $typeDict[$type], $Data['filter_' . $filterName . '_value']);
            } else if ($template == "rangeDateTime" && isset($Data['filter_' . $filterName . '_end'])) {
                if (isset($Data['filter_' . $filterName . '_start'])) {
                    $query->where($filterName, ">=", $Data['filter_' . $filterName . '_start']);
                }
                if (isset($Data['filter_' . $filterName . '_end'])) {
                    $query->where($filterName, "<=", $Data['filter_' . $filterName . '_end']);
                }
            }
        }
        //過濾選項-自訂        
        $query = $this->useFilterExtend($query, $Data);
        $query = $this->useCustomTextSearch($query, $Data);

        if (isset($Data['filter_text_key']) && in_array($Data['filter_text_key'], $this->filterTextKey)) {
            $query->where($Data['filter_text_key'], 'like', '%' . $Data['filter_text_value'] . '%');
        }



        //排序
        if (isset($Data['order_by'])) {
            $order_by = explode(',', $Data['order_by']);
            $query->orderBy($order_by[0], $order_by[1]);
        }
        //
        return $query;
    }
}
