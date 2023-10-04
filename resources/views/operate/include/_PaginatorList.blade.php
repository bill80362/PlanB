{{--換頁模板--}}
<div class="row">
    <div class="col-12 d-flex align-items-center justify-content-between">
        <div class="text-muted fz-sm me-2">
            <span class="text-primary">{{ ($Paginator->total() > 0)?1 + ($Paginator->currentPage() - 1) * $Paginator->perPage():0}}</span>-<span class="text-primary">{{min(10 + ($Paginator->currentPage() - 1) * $Paginator->perPage(), $Paginator->total())}}</span> / <span
                class="text-primary">{{$Paginator->total()}}</span>，{{__('每頁顯示')}} <a class="text-dark"
                href="##">10</a>、<a class="text-primary" href="##">25</a>、<a
                class="text-primary" href="##">50</a>、<a class="text-primary"
                href="##">100</a> 筆
        </div>
        <div>
            <ul class="pagination pagination-sm m-0">
                <li class="page-item page-arrow"><a class="page-link" href="{{$Paginator->url(1)}}" aria-label="第一頁"><i class="ti-angle-double-left"></i></a></li>
                @if($Paginator->currentPage() > 1)
                    <li class="page-item page-arrow"><a class="page-link" href="{{$Paginator->previousPageUrl()}}"
                        aria-label="上一頁"><i class="ti-angle-left"></i></a></li>
                @endif
                @foreach($Paginator->withQueryString()->getUrlRange(max([$Paginator->currentPage()-3,1]),min([$Paginator->currentPage()+3,$Paginator->lastPage()])) as $key => $value)
                    <li class="page-item {{$key==$Paginator->currentPage()?"active":""}}"><a class="page-link" href="{{$value}}">{{$key}}</a></li>
                @endforeach
                @if($Paginator->currentPage() < $Paginator->lastPage())
                    <li class="page-item page-arrow"><a class="page-link" href="{{$Paginator->nextPageUrl()}}"
                        aria-label="下一頁"><i class="ti-angle-right"></i></a></li>
                @endif
                <li class="page-item page-arrow"><a class="page-link" href="{{ $Paginator->url($Paginator->lastPage()) }}"
                        aria-label="最尾頁"><i class="ti-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>