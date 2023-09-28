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
                                        @can('user_delete')
                                            <hr class="dropdown-divider">
                                            <button id="btnDeleteBatch" type="button" class="dropdown-item">{{__("勾選刪除")}}</button>
                                        @endcan
                                    </div>
                                </div>
                                <div class="btn-group me-2">
                                    @canany('user_import','user_export')
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__("匯入")}} / {{__("匯出")}}
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('user_import')
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#importModal">
                                            {{__("匯入")}}
                                        </button>
                                        @endcan
                                        @can('user_export')
                                        <a target="_blank" class="dropdown-item" href="{{route("user_export",["type"=>"key"])}}?{{request()->getQueryString()}}">
                                            {{__("匯出參數版")}}
                                        </a>
                                        <a target="_blank" class="dropdown-item" href="{{route("user_export",["type"=>"value"])}}?{{request()->getQueryString()}}">
                                            {{__("匯出文字版")}}
                                        </a>
                                        @endcan
                                    </div>
                                    @endcanany
                                </div>
                                <div class="btn-group">
                                    @can('user_create')
                                        <a class="btn btn-primary" href="{{route("user_update",["id"=>0])}}?{{request()->getQueryString()}}"> {{__("新增")}} </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group input-group" id="searchContnet">
                                            <div class="input-group-prepend">
                                                <select class="form-select" name="filter_text_key"
                                                    data-target="#searchFilter">
                                                    <option value="">{{__("不限制")}}</option>
                                                    @foreach(["name","id","email"] as $value)
                                                    <option value="{{$value}}" {{request()->get("filter_text_key")==$value?"selected":""}}>{{__($Model->Column_Title_Text[$value])}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="filter_text_value"
                                                value="" data-target="#searchString">
                                            <button class="btn btn-dark" type="button" id="searchButton"><i
                                                    class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter"><ion-icon
                                            name="funnel-outline"></ion-icon>
                                        {{__("篩選器")}}</button>
                                    <a class="btn btn-muted" href="{{request()->url()}}">{{__("重置查詢")}}</a>
                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">
                                    <p class="d-flex align-items-center flex-content-start fz-sm filter-string">
                                        <span class="text-muted me-2">{{__("篩選器")}}：</span>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">
                                            上架狀態：上架 <i class="ti-close"></i>
                                        </button>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">
                                            上架區間狀態：進行中、未開始 <i class="ti-close"></i>
                                        </button>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle ascStyle">{{__("流水")}}</th>
                                                    <th class="sortStyle ascStyle">{{__($Model->Column_Title_Text["id"])}}</th>
                                                    <th class="sortStyle descStyle">{{__($Model->Column_Title_Text["name"])}}</th>
                                                    <th class="sortStyle unsortStyle">{{__($Model->Column_Title_Text["email"])}}</th>
                                                    <th class="sortStyle unsortStyle">{{__($Model->Column_Title_Text["status"])}}</th>
                                                    <th class="sortStyle unsortStyle">{{__("最後修改人")}}</th>
                                                    <th class="sortStyle unsortStyle">{{__("最後修改時間")}}</th>
                                                    <th class="text-end">
                                                        <button class="btn btn-link slideFunc-toggle text-muted"
                                                            data-target="#listSetting"><i
                                                                class="ti-settings"></i></button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($Paginator->items() as $index => $Item)
                                                <tr class="{{$index%2?"":"bg-muted-light"}}">
                                                    <td class="border-0">
                                                        <input type="checkbox" class="form-check-input" name="id_array[]" value="1"> {{$index+1}}
                                                    </td>
                                                    <td class="border-0">{{$Item->id}}</td>
                                                    <td class="border-0">{{$Item->name}}</td>
                                                    <td class="border-0">{{$Item->email}}</td>
                                                    <td class="border-0">{{__($Model->statusText[$Item->status]??$Item->status)}}</td>
                                                    <td class="border-0">{{$Item->audits()->latest()->first()?->user?->name}}</td>
                                                    <td class="border-0">{{$Item->updated_at}}</td>
                                                    <td class="border-0 text-end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ti-more-alt"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                @can('user_update')
                                                                    <li><a class="dropdown-item"
                                                                       href="/operate/user/{{$Item->id}}?{{request()->getQueryString()}}"
                                                                    >{{__("編輯")}}</a></li>
                                                                @endcan
                                                                @can('user_delete')
                                                                        <li><button class="dropdown-item"
                                                                            type="button"
                                                                            onclick="postForm('/operate/user/del?{{request()->getQueryString()}}',{
                                                                        'id_array[]':{{$Item->id}},
                                                                        _token:'{{ csrf_token() }}'
                                                                        })"
                                                                    >{{__("刪除")}}
                                                                            </button></li>
                                                                @endcan
                                                                    <a target="_blank" class="dropdown-item"
                                                                       href="/operate/user/{{$Item->id}}/audit?{{request()->getQueryString()}}"
                                                                    >{{__("紀錄")}}</a>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @include("/operate/include/_PaginatorList")
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
    <!-- 彈出視窗 -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route("user_import")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">{{__("匯入新增")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="card-subtitle mb-2">{{__("請上傳Excel檔案")}}</h6>
                        <div class=" mb-0">
                            <input type="file" class="" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{__("送出")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form>
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

                        <div class="form-group">
                            <label>{{$Model->Column_Title_Text["status"]}}</label>
                            <select name="filter_status[]" class="select2bs5" multiple="multiple" style="width: 100%;">
                                @foreach ($Model->statusText as $key => $value)
                                    <option
                                        value="{{$key}}" {{in_array($key,(array)request()->get("filter_status"))?"selected":""}} >{{$value}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <input id="searchFilter" type="hidden" value="">
                <input id="searchString" type="hidden" value="">
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2">{{__("清除篩選器")}}</button>
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
            <div class="slideFunc-body px-3 py-3">
                <div class="row">
                    <div class="col-12">
                        <div class="list-group">

                            <div class="sort-item">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input" checked disabled>
                                        <label class="form-check-label" for="">編號</label>
                                    </div>
                                    <i class="ti-lock "></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">排列序號</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">圖片</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                            </div>

                            <div class="sort-item" id="sortGroup">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">編修狀態</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">名稱</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">商品編號</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">狀態/日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">點閱數</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">串接狀態</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">類型</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">組合商品</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">一頁式商品</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">最後修改者</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">最後修改日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">建置日期</label>
                                    </div>
                                    <i class="ti-align-justify"></i>
                                </div>
                            </div>
                            <div class="sort-item">
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格一</label>
                                    </div>
                                    <i class="ti-lock "></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格二</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="list-group-item d-flex flex-content-between align-items-center">
                                    <div class="form-check flex-fill">
                                        <input class="form-check-input" type="checkbox" value=""
                                            aria-label="Checkbox for following text input">
                                        <label class="form-check-label" for="">規格三</label>
                                    </div>
                                    <i class="ti-lock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2">取消</button>
                <button type="submit" class="btn btn-primary mx-2">儲存</button>
            </div>
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
        /**
         * sends a request to the specified url from a form. this will change the window location.
         * @param {string} path the path to send the post request to
         * @param {object} params the parameters to add to the url
         * @param {string} [method=post] the method to use on the form
         */

        function postForm(path, params, method = 'post') {
            const form = document.createElement('form');
            form.method = method;
            form.action = path;
            for (const key in params) {
                if (params.hasOwnProperty(key)) {
                    const hiddenField = document.createElement('input');
                    hiddenField.type = 'hidden';
                    hiddenField.name = key;
                    hiddenField.value = params[key];

                    form.appendChild(hiddenField);
                }
            }
            document.body.appendChild(form);
            form.submit();
        }

        // tableSort
        // $('#sortableTable').tablesort();

        // sortable.js
        new Sortable(document.getElementById('sortGroup'), {
            filter: '.in-fixed', // 'filtered' class is not draggable
            animation: 150,
            handle: '.ti-align-justify',
            ghostClass: 'bg-secondary-light'
        });

        //批次刪除
        $("#btnDeleteBatch").on("click",function(){
            var postArray = [];
            $("input[type=checkbox][name^='id_array']:checked").map(function(){
                let val = $(this).val();
                postArray["id_array["+val+"]"] = val;
            });
            postArray["_token"] = '{{ csrf_token() }}';
            //送出
            postForm('/operate/user/del?{{request()->getQueryString()}}',postArray)
        });
    </script>
@endsection
