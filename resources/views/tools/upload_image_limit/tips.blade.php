<div class="text-danger">
    @if($Data["mimes"])
        <div>{{__("限制檔案類型")}}:{{implode(",",$Data["mimes"])}}</div>
    @endif
    @if($Data["max"])
        <div>{{__("檔案上限")}}:{{$Data["max"]}}KB</div>
    @endif
    @if($Data["onlySuggestDimension"] && $Data["dimensions"])
        <div>{{__("建議圖片大小")}}: {{collect($Data["dimensions"])->map(fn($value,$key)=>(__($key).":".$value."px"))->implode(",")}}</div>
    @elseif($Data["dimensions"])
        <div>{{__("限制圖片大小")}}: {{collect($Data["dimensions"])->map(fn($value,$key)=>(__($key).":".$value."px"))->implode(",")}}</div>
    @endif
</div>
