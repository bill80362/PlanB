<?php

namespace App\Models;

/**
 * 匯出 匯入
 */
trait FilterTemplateTrait
{
    /**
     * select2 多選
     */
    public function scopeFilter($query, array $Data)
    {
        //過濾選項-使用樣板
        foreach ($this->filterTemplate as $filterName => $template) {
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
            }
        }
        //過濾選項-自訂
        $query = $this->useFilterExtend($query, $Data);
        //過濾文字條件
        if (isset($Data['filter_text_key'])) {
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
