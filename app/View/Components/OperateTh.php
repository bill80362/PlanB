<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class OperateTh extends Component
{
    public string $className="";
    public string $clickString="";
    /**
     * Create a new component instance.
     */
    public function __construct(public $column,public $model)
    {
        //不是實體欄位，無法排序
        if( !isset($model->Column_Title_Text[$column]) ){
            $this->className = "";
            $this->clickString = "";//預設都跑反序
            return ;
        }
        //預設
        $this->className = "sortStyle";
        $this->clickString ="orderBy('".$column."','desc')";//預設都跑反序
        //
        $order_by = request()->get("order_by")??"";
        $order_by_key = explode(",",$order_by)[0];
        $order_by_rule = explode(",",$order_by)[1]??"";
        if($order_by_key==$column){
            if($order_by_rule=="asc"){
                $this->className = "sortStyle ascStyle";
                $this->clickString ="orderBy('".$column."','desc')";
            }elseif($order_by_rule=="desc"){
                $this->className = "sortStyle descStyle";
                $this->clickString ="orderBy('".$column."','asc')";
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('operate.components_view.list.th');
    }
}
