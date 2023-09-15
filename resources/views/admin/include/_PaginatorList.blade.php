{{--換頁模板--}}
<div class="row">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <div>
            第{{$Paginator->currentPage()}}/{{$Paginator->lastPage()}}頁 | 每頁{{$Paginator->perPage()}}筆 | 共{{$Paginator->total()}}筆
        </div>
        <div>
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="{{$Paginator->previousPageUrl()}}">«</a></li>
                @foreach($Paginator->getUrlRange(max([$Paginator->currentPage()-3,1]),min([$Paginator->currentPage()+3,$Paginator->lastPage()])) as $key => $value)
                    <li class="page-item"><a class="page-link {{$key==$Paginator->currentPage()?"bg-warning":""}}" href="{{$value}}">{{$key}}</a></li>
                @endforeach
                <li class="page-item"><a class="page-link" href="{{$Paginator->nextPageUrl()}}">»</a></li>
            </ul>
        </div>
    </div>


</div>
