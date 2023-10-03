@extends('operate.layout._Master')

@section('HeaderCSS')
@endsection


@section('Content')
    <!-- main content part here -->
    <section>
        <div class="container-fluid p-0 ">
            <!-- page Content  -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>{{ __(app("App\Services\Route\RouteTitle")->getTitle(request()->route()->getName())) }}</h2>
                                <!-- Example single danger button -->
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i> {{__("處理")}}
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item">{{__("全選")}}</button>
                                        <button type="button" class="dropdown-item">{{__("取消全選")}}</button>
                                        <button type="button" class="dropdown-item">{{__("反向選擇")}}</button>
                                        <hr class="dropdown-divider">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter"><ion-icon
                                            name="funnel-outline"></ion-icon>
                                        {{__("篩選器")}}</button>
                                    <a class="btn btn-muted" href="{{request()->url()}}">{{__("重置查詢")}}</a>
                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">

                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle" data-column="default_serial_number">{{__("default_serial_number")}}</th>
                                                    <th class="sortStyle" data-column="id">{{__("目錄名稱")}}</th>
                                                    <th class="sortStyle" data-column="files_count">{{__("檔案數量")}}</th>
                                                    <th class="sortStyle" data-column="size">{{__("使用空間")}}</th>

                                                    <th class="text-end" data-column="operate">
                                                        <button class="btn btn-link slideFunc-toggle text-muted" onclick="$('#listSetting').toggleClass('in-active')"
                                                            data-target="#listSetting"><i
                                                                class="ti-settings"></i></button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($Paginator->items() as $index => $Item)
                                                <tr class="{{$index%2?"":"bg-muted-light"}}">
                                                    <td class="border-0" data-column="default_serial_number">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]" value="1"> {{$index+1}}
                                                    </td>
                                                    <td class="border-0" data-column="id">{{$Item->id}}</td>
                                                    <td class="border-0" data-column="files_count">{{count($Item->files)}}</td>
                                                    <td class="border-0" data-column="size">{{$Item->size}}</td>

                                                    <td class="border-0 text-end" data-column="operate">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
{{--                                                                @can('file_upload_update')--}}
                                                                    <li><a class="dropdown-item"
                                                                       href="/operate/file_upload/{{$Item->id}}?{{request()->getQueryString()}}"
                                                                    >{{__("編輯")}}</a></li>
{{--                                                                @endcan--}}
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{{--                            @include("/operate/include/_PaginatorList")--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- main content part end -->



    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>
@endsection


@section('Modal')
    <form id="filterForm">
    <!-- Modal -->
    <div class="slideFunc-box" id="prodFilter">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="prodFilterTitle">{{__("篩選器")}}</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="slideFunc-body px-3 py-3">
                <div class="row">
                    <div class="col-12">



                    </div>
                </div>
                <input id="filter_text_key" name="filter_text_key" type="hidden" value="{{request()->get("filter_text_key")}}">
                <input id="filter_text_value" name="filter_text_value" type="hidden" value="{{request()->get("filter_text_value")}}">
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2"
                        onclick="$('.select2bs5').empty() && $(':input','#filterForm').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);
                "
                >{{__("清除篩選器")}}</button>
                <button type="submit" class="btn btn-primary mx-2">{{__("套用篩選條件")}}</button>
            </div>
        </div>
    </div>
    </form>
    <!-- Modal -->
    <div class="slideFunc-box" id="listSetting">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="listSettingTitle">{{__("列表欄位調整")}}</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
{{--            <form action="{{route("file_upload_saveListColumn")}}" method="POST">--}}
{{--                @csrf--}}

{{--            </form>--}}
        </div>
    </div>
@endsection


@section('BodyJavascript')
    <script>
        //Initialize Select2 Elements
        $('.select2bs5').each(function(i, ele) {
            $(ele).select2({
                dropdownParent: $('#prodFilter'),
            })
        })
        // tableSort
        // $('#sortableTable').tablesort();

        // sortable.js
        // new Sortable(document.getElementById('sortGroup'), {
        //     filter: '.in-fixed', // 'filtered' class is not draggable
        //     animation: 150,
        //     handle: '.ti-align-justify',
        //     ghostClass: 'bg-secondary-light'
        // });

        //排序
        function orderBy(order_key,order_rule){
            let queryString = '{{request()->getQueryString()}}';
            let newQueryString = '';
            queryString.split("&amp;").map(function(item){
                let name = item.split("=")[0];
                let value = item.split("=")[1];
                if(  ! (name.indexOf('order_by')>=0 )  ){
                    newQueryString += item+'&';
                }
            });
            location.href = "?" + newQueryString + '&order_by=' + order_key + "," + order_rule;
        }

        //欄位排序修改
        let columns = @json($columns);
        // refreshTable();
        function refreshTable() {
            //隱藏需要隱藏的欄位
            $('#sortableTable').find('th,td').each(function(i,element){
                if(jQuery.inArray( $(element).attr('data-column') , Object.values(columns) ) === -1){
                    $(element).hide();
                }
            });
            //重新排列標題
            let listHead = $('#sortableTable thead tr');
            let listHeadItems = listHead.find('th').sort(function(a, b) {
                let a_key_number = Object.keys(columns).find(k=>columns[k]===$(a).attr('data-column'));
                let b_key_number = Object.keys(columns).find(k=>columns[k]===$(b).attr('data-column'));
                return a_key_number - b_key_number;
            });
            listHead.find('th').remove();
            listHead.append(listHeadItems);
            //重新排列內文
            let listBody = $('#sortableTable tbody tr').html(function() {
                let subList = $(this).children().sort(function(a, b) {
                    let a_key_number = Object.keys(columns).find(k=>columns[k]===$(a).attr('data-column'));
                    let b_key_number = Object.keys(columns).find(k=>columns[k]===$(b).attr('data-column'));
                    return a_key_number - b_key_number;
                });
                return subList;
            });
            listBody.find('#sortableTable tbody tr').remove();
            listBody.append(listBody);
        }
    </script>
@endsection
