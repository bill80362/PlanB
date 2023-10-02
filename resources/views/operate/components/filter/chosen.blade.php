<p class="d-flex align-items-center flex-content-start fz-sm filter-string">
    <span class="text-muted me-2">{{__("篩選器")}}：</span>
    @foreach( request()->all() as $filter_name => $filter_value)
        @php $column = str_replace("filter_","",$filter_name); @endphp
        @if( strpos($filter_name,"filter_") === 0 )
            @if( is_array($filter_value) && isset($Model->{$column."Text"}) )
                @foreach( $filter_value as  $filter_value_sub)
                    <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3" onclick="deleteFilter('{{$filter_name}}','{{$filter_value_sub}}')">
                        {{$Model->Column_Title_Text[$column]??""}}：{{$Model->{$column."Text"}[$filter_value_sub]}} <i class="ti-close"></i>
                    </button>
                @endforeach
            @elseif(isset($Model->{$column."Text"}))
                <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3" onclick="deleteFilter('{{$filter_name}}','{{$filter_value}}')">
                    {{$Model->Column_Title_Text[$column]??""}}：{{$Model->{$column."Text"}[$filter_value]}} <i class="ti-close"></i>
                </button>
            @else
                @foreach( $Model->filterTemplate as $useTemplateFilter => $template)
                    @if($template=="rangeDate" && $column==$useTemplateFilter."_start")
                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3" onclick="deleteFilter('{{$filter_name}}','{{$filter_value}}')">
                            {{$useTemplateFilter}}:{{$filter_value}}{{__("(起)")}} <i class="ti-close"></i>
                        </button>
                    @elseif($template=="rangeDate" && $column==$useTemplateFilter."_end")
                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3" onclick="deleteFilter('{{$filter_name}}','{{$filter_value}}')">
                            {{$useTemplateFilter}}:{{$filter_value}}{{__("(迄)")}} <i class="ti-close"></i>
                        </button>
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach
</p>

<script>
    //刪除Filter
    function deleteFilter(deleteFilterName,deleteFilterValue){
        let queryString = '{{request()->getQueryString()}}';
        let newQueryString = '';
        queryString.split("&amp;").map(function(item){
            let name = item.split("=")[0];
            let value = item.split("=")[1];
            if(  ! (name.indexOf(deleteFilterName)>=0 && value == deleteFilterValue)  ){
                newQueryString += item+'&';
            }
        });
        location.href = "?" + newQueryString;
    }
</script>
