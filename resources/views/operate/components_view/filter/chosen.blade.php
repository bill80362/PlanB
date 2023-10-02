<p class="d-flex align-items-center flex-content-start fz-sm filter-string">
    <span class="text-muted me-2">{{__("篩選器")}}：</span>
    @foreach( $chosenFilterList as $chosenFilter)
        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3" onclick="deleteFilter('{{$chosenFilter["key"]}}','{{$chosenFilter["value"]}}')">
            {{__($chosenFilter["title"])}}：{{$chosenFilter["titleValue"]}} <i class="ti-close"></i>
        </button>
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
