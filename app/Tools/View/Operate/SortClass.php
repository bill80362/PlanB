<?php

namespace App\Tools\View\Operate;

class SortClass
{
    public string $order_by_key="";
    public string $order_by_rule="";
    public function __construct(){
        $order_by = request()->get("order_by")??"";
        $this->order_by_key = explode(",",$order_by)[0];
        $this->order_by_rule = explode(",",$order_by)[1]??"";
    }

    public function className($checkColumn){
        if($this->order_by_key==$checkColumn){
            if($this->order_by_rule=="asc"){
                return "sortStyle ascStyle";
            }elseif($this->order_by_rule=="desc"){
                return "sortStyle descStyle";
            }
        }
        return "";
    }
    public function clickSort($checkColumn){
        if($this->order_by_key==$checkColumn){
            if($this->order_by_rule=="asc"){
                return "sortStyle ascStyle";
            }elseif($this->order_by_rule=="desc"){
                return "sortStyle descStyle";
            }
        }
        return "";
    }
}
