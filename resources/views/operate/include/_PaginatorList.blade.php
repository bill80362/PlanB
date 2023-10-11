{{--換頁模板--}}
<div class="row">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <div class="text-muted fz-sm me-2">
            <span class="text-primary">{{ ($paginator->total() > 0)?1 + ($paginator->currentPage() - 1) * $paginator->perPage():0}}</span>-<span class="text-primary">{{min(10 + ($paginator->currentPage() - 1) * $paginator->perPage(), $paginator->total())}}</span> /
            <span class="text-primary">{{$paginator->total()}}</span>，{{__('每頁顯示')}}
            <a class="{{$paginator->perPage()==10?"text-dark":"text-primary"}}" href="{{$paginator->url(1)}}&pageLimit=10">10</a>、
            <a class="{{$paginator->perPage()==25?"text-dark":"text-primary"}}" href="{{$paginator->url(1)}}&pageLimit=25">25</a>、
            <a class="{{$paginator->perPage()==50?"text-dark":"text-primary"}}" href="{{$paginator->url(1)}}&pageLimit=50">50</a>、
            <a class="{{$paginator->perPage()==100?"text-dark":"text-primary"}}" href="{{$paginator->url(1)}}&pageLimit=100">100</a> {{__("筆")}}
        </div>
        <div>
            <ul class="pagination pagination-sm m-0">
                <li class="page-item page-arrow"><a class="page-link" href="{{$paginator->url(1)}}" aria-label="第一頁"><i class="ti-angle-double-left"></i></a></li>
                @if($paginator->currentPage() > 1)
                    <li class="page-item page-arrow"><a class="page-link" href="{{$paginator->previousPageUrl()}}"
                        aria-label="上一頁"><i class="ti-angle-left"></i></a></li>
                @endif
                @foreach($paginator->withQueryString()->getUrlRange(max([$paginator->currentPage()-3,1]),min([$paginator->currentPage()+3,$paginator->lastPage()])) as $key => $value)
                    <li class="page-item {{$key==$paginator->currentPage()?"active":""}}"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
                @endforeach
                @if($paginator->currentPage() < $paginator->lastPage())
                    <li class="page-item page-arrow"><a class="page-link" href="{{$paginator->nextPageUrl()}}"
                        aria-label="下一頁"><i class="ti-angle-right"></i></a></li>
                @endif
                <li class="page-item page-arrow"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}"
                        aria-label="最尾頁"><i class="ti-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
