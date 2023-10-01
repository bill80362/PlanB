@if($template=="select2")
<div class="form-group">
    <label>{{$model->Column_Title_Text[$column]??""}}</label>
    <select name="filter_{{$column}}[]" class="select2bs5" multiple="multiple" style="width: 100%;">
        @if( isset($Model->{$column."Text"}) )
            @foreach ((array)$Model->{$column."Text"} as $key => $value)
                <option value="{{$key}}" {{in_array($key,(array)request()->get("filter_".$column))?"selected":""}} >{{$value}}</option>
            @endforeach
        @endif
    </select>
</div>


@endif
