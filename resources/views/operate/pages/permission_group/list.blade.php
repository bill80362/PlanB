@extends('operate.layout._Empty')

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
                                <h2> @include('/operate/components/title/page_title')</h2>
                                <!-- Example single danger button -->
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i> {{ __('處理') }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item">{{ __('全選') }}</button>
                                        <button type="button" class="dropdown-item">{{ __('取消全選') }}</button>
                                        <button type="button" class="dropdown-item">{{ __('反向選擇') }}</button>
                                        <hr class="dropdown-divider">
                                        @can('permissionGroup_delete')
                                            <hr class="dropdown-divider">
                                            <button id="btnDeleteBatch" type="button"
                                                class="dropdown-item">{{ __('勾選刪除') }}</button>
                                        @endcan
                                    </div>
                                </div>
                                {{--                                <div class="btn-group me-2"> --}}
                                {{--                                    @canany('permissionGroup_import', 'permissionGroup_export') --}}
                                {{--                                        <button type="button" class="btn btn-secondary dropdown-toggle" --}}
                                {{--                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> --}}
                                {{--                                            {{ __('匯入') }} / {{ __('匯出') }} --}}
                                {{--                                        </button> --}}
                                {{--                                        <div class="dropdown-menu"> --}}
                                {{--                                            @can('permissionGroup_import') --}}
                                {{--                                                <button type="button" class="dropdown-item" data-bs-toggle="modal" --}}
                                {{--                                                        data-bs-target="#importModal"> --}}
                                {{--                                                    {{ __('匯入') }} --}}
                                {{--                                                </button> --}}
                                {{--                                            @endcan --}}
                                {{--                                            @can('permissionGroup_export') --}}
                                {{--                                                <a target="_blank" class="dropdown-item" --}}
                                {{--                                                   href="{{ route('permission_group_export', ['type' => 'key', ...request()->query()]) }}"> --}}
                                {{--                                                    {{ __('匯出參數版') }} --}}
                                {{--                                                </a> --}}
                                {{--                                                <a target="_blank" class="dropdown-item" --}}
                                {{--                                                   href="{{ route('permission_group_export', ['type' => 'value', ...request()->query()]) }}"> --}}
                                {{--                                                    {{ __('匯出文字版') }} --}}
                                {{--                                                </a> --}}
                                {{--                                            @endcan --}}
                                {{--                                        </div> --}}
                                {{--                                    @endcanany --}}
                                {{--                                </div> --}}
                                <div class="btn-group">
                                    @can('permissionGroup_create')
                                        <a class="btn btn-primary"
                                            href="{{ route('permission_group_update', ['id' => 0]) }}?{{ request()->getQueryString() }}">
                                            {{ __('新增') }} </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group input-group" id="searchContent">
                                            <div class="input-group-prepend">
                                                <select class="form-select" id="filter_text_key_outside"
                                                    data-target="#searchFilter"
                                                    onchange="$('#filter_text_key').val($(this).val())">
                                                    <option value="">{{ __('不限制') }}</option>
                                                    @foreach ($model->filterTextKey as $value)
                                                        <option value="{{ $value }}"
                                                            {{ request()->get('filter_text_key') == $value ? 'selected' : '' }}>
                                                            {{ __($model->Column_Title_Text[$value]) }}</option>
                                                    @endforeach

                                                    @foreach ($model->filterTextKeyCustom as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ request()->get('filter_text_key') == $key ? 'selected' : '' }}>
                                                            {{ __($value) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" id="filter_text_value_outside"
                                                value="{{ request()->get('filter_text_value') }}"
                                                data-target="#searchString"
                                                onchange="$('#filter_text_value').val($(this).val())">
                                            <button class="btn btn-dark" type="button"
                                                onclick="$('#filterForm').submit()"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter">
                                        <i class="ionicon-funnel-outline"></i>
                                        {{ __('篩選器') }}</button>
                                    <a class="btn btn-muted" href="{{ request()->url() }}">{{ __('重置查詢') }}</a>
                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">
                                    <x-OperateFilterChosen :model="$model"></x-OperateFilterChosen>
                                    {{--                                    @include("operate.components.filter.chosen") --}}
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle" data-column="default_serial_number">
                                                        {{ __('default_serial_number') }}</th>
                                                    <x-OperateTh column="id" :model="$model"></x-OperateTh>
                                                    <x-OperateTh column="name" :model="$model"></x-OperateTh>
                                                    <x-OperateTh column="email" :model="$model"></x-OperateTh>
                                                    <x-OperateTh column="status" :model="$model"></x-OperateTh>
                                                    <x-OperateTh column="updated_by" :model="$model"></x-OperateTh>
                                                    <x-OperateTh column="updated_at" :model="$model"></x-OperateTh>
                                                    <th class="text-end" data-column="operate">
                                                        <button class="btn btn-link slideFunc-toggle text-muted"
                                                            data-target="#listSetting"><i class="ti-settings"></i></button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($paginator->items() as $index => $Item)
                                                    <tr class="{{ $index % 2 ? '' : 'bg-muted-light' }}">
                                                        <td class="border-0" data-column="default_serial_number">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="id_array[]" value="{{ $Item->id }}">
                                                            {{ $index + 1 }}
                                                        </td>
                                                        <td class="border-0" data-column="id">{{ $Item->id }}</td>
                                                        <td class="border-0" data-column="name">{{ $Item->name }}</td>
                                                        <td class="border-0" data-column="email">{{ $Item->email }}</td>
                                                        <td class="border-0" data-column="status">
                                                            {{ __($model->statusText[$Item->status] ?? $Item->status) }}
                                                        </td>
                                                        <td class="border-0" data-column="updated_by">
                                                            {{ $Item->audits()->latest()->first()?->user?->name }}</td>
                                                        <td class="border-0" data-column="updated_at">
                                                            {{ $Item->updated_at }}</td>
                                                        <td class="border-0 text-end" data-column="operate">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-light dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    @can('permissionGroup_update')
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('permission_group_update', ['id' => $Item->id]) }}?{{ request()->getQueryString() }}">{{ __('編輯') }}</a>
                                                                        </li>
                                                                    @endcan
                                                                    @can('permissionGroup_delete')
                                                                        <li><button class="dropdown-item" type="button"
                                                                                onclick="postForm('{{ route('permission_group_del') }}?{{ request()->getQueryString() }}',{
                                                                            'id_array[]':{{ $Item->id }},
                                                                            _token:'{{ csrf_token() }}'
                                                                            })">{{ __('刪除') }}
                                                                            </button></li>
                                                                    @endcan
                                                                    {{-- <a target="_blank" class="dropdown-item"
                                                                        href="{{ route('permission_group_audit', ['id' => $Item->id]) }}?{{ request()->getQueryString() }}">{{ __('紀錄') }}</a> --}}
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
                            @include('/operate/include/_PaginatorList')
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
    {{--    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" --}}
    {{--         aria-hidden="true"> --}}
    {{--        <div class="modal-dialog" role="document"> --}}
    {{--            <form action="{{ route('permission_group_import') }}" method="post" enctype="multipart/form-data"> --}}
    {{--                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
    {{--                <div class="modal-content"> --}}
    {{--                    <div class="modal-header"> --}}
    {{--                        <h5 class="modal-title" id="importModalLabel">{{ __('匯入新增') }}</h5> --}}
    {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
    {{--                            <span aria-hidden="true">&times;</span> --}}
    {{--                        </button> --}}
    {{--                    </div> --}}
    {{--                    <div class="modal-body"> --}}
    {{--                        <h6 class="card-subtitle mb-2">{{ __('請上傳Excel檔案') }}</h6> --}}
    {{--                        <div class=" mb-0"> --}}
    {{--                            <input type="file" class="" name="file"> --}}
    {{--                        </div> --}}
    {{--                    </div> --}}
    {{--                    <div class="modal-footer"> --}}
    {{--                        <button type="submit" class="btn btn-primary">{{ __('送出') }}</button> --}}
    {{--                    </div> --}}
    {{--                </div> --}}
    {{--            </form> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    <form id="filterForm">
        <!-- Modal -->
        <div class="slideFunc-box" id="prodFilter">
            <div class="slideFunc-content">
                <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                    <h5 class="slideFunc-title" id="prodFilterTitle">{{ __('篩選器') }}</h5>
                    <button type="button" class="btn-close" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="slideFunc-body px-3 py-3">
                    <div class="row">
                        <div class="col-12">
                            @foreach ($model->filterTemplate as $column => $setting)
                                <x-OperateFilterDiv :column="$column" :model="$model"
                                    :setting="$setting"></x-OperateFilterDiv>
                            @endforeach
                            {{--                        //自訂篩選條件 --}}
                            {{--                        <div class="form-group"> --}}
                            {{--                            <label>{{$model->Column_Title_Text["status"]}}</label> --}}
                            {{--                            <select name="filter_status[]" class="select2bs5" multiple="multiple" style="width: 100%;"> --}}
                            {{--                                @foreach ($model->statusText as $key => $value) --}}
                            {{--                                    <option --}}
                            {{--                                        value="{{$key}}" {{in_array($key,(array)request()->get("filter_status"))?"selected":""}} >{{$value}}</option> --}}
                            {{--                                @endforeach --}}
                            {{--                            </select> --}}
                            {{--                        </div> --}}

                        </div>
                    </div>
                    <input id="filter_text_key" name="filter_text_key" type="hidden"
                        value="{{ request()->get('filter_text_key') }}">
                    <input id="filter_text_value" name="filter_text_value" type="hidden"
                        value="{{ request()->get('filter_text_value') }}">
                </div>
                <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                    <button type="reset" class="btn btn-muted mx-2"
                        onclick="$('.select2bs5').empty() && $(':input','#filterForm').not(':button, :submit, :reset, :hidden').val('').prop('checked', false).prop('selected', false);
                ">{{ __('清除篩選器') }}</button>
                    <button type="submit" class="btn btn-primary mx-2">{{ __('套用篩選條件') }}</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal -->
    <div class="slideFunc-box" id="listSetting">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="listSettingTitle">{{ __('列表欄位調整') }}</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form action="{{ route('permission_group_saveListColumn') }}" method="POST">
                @csrf
                <div class="slideFunc-body px-3 py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group">
                                <div class="sort-item">
                                    @foreach ($tableSetting['lockColumn'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}"
                                                    aria-label="Checkbox for following text input" checked disabled>
                                                <label class="form-check-label"
                                                    for="">{{ __($model->Column_Title_Text[$value] ?? $value) }}</label>
                                            </div>
                                            <i class="ti-lock "></i>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="sort-item" id="sortGroup">
                                    @foreach ($tableSetting['canUseColumn'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}" name="list[]"
                                                    aria-label="Checkbox for following text input"
                                                    {{ in_array($value, $columns) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">{{ __($model->Column_Title_Text[$value] ?? $value) }}</label>
                                            </div>
                                            <i class="ti-align-justify"></i>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="sort-item">
                                    @foreach ($tableSetting['lockColumnTail'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}"
                                                    aria-label="Checkbox for following text input" checked disabled>
                                                <label class="form-check-label"
                                                    for="">{{ __($model->Column_Title_Text[$value] ?? $value) }}</label>
                                            </div>
                                            <i class="ti-lock "></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                    {{-- <button type="reset" class="btn btn-muted mx-2" >取消</button> --}}
                    <button type="submit" class="btn btn-primary mx-2">儲存</button>
                </div>
            </form>
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
        new Sortable(document.getElementById('sortGroup'), {
            filter: '.in-fixed', // 'filtered' class is not draggable
            animation: 150,
            handle: '.ti-align-justify',
            ghostClass: 'bg-secondary-light'
        });

        //排序
        function orderBy(order_key, order_rule) {
            let queryString = '{{ request()->getQueryString() }}';
            let newQueryString = '';
            queryString.split("&amp;").map(function(item) {
                let name = item.split("=")[0];
                let value = item.split("=")[1];
                if (!(name.indexOf('order_by') >= 0)) {
                    newQueryString += item + '&';
                }
            });
            location.href = "?" + newQueryString + '&order_by=' + order_key + "," + order_rule;
        }

        //批次刪除
        $("#btnDeleteBatch").on("click", function() {
            var postArray = [];
            $("input[type=checkbox][name^='id_array']:checked").map(function() {
                let val = $(this).val();
                postArray["id_array[" + val + "]"] = val;
            });
            postArray["_token"] = '{{ csrf_token() }}';
            //送出
            postForm('/operate/permission_group/del?{{ request()->getQueryString() }}', postArray)
        });

        //欄位排序修改
        let columns = @json($columns);
        refreshTable();

        function refreshTable() {
            //隱藏需要隱藏的欄位
            $('#sortableTable').find('th,td').each(function(i, element) {
                if (jQuery.inArray($(element).attr('data-column'), Object.values(columns)) === -1) {
                    $(element).hide();
                }
            });
            //重新排列標題
            let listHead = $('#sortableTable thead tr');
            let listHeadItems = listHead.find('th').sort(function(a, b) {
                let a_key_number = Object.keys(columns).find(k => columns[k] === $(a).attr('data-column'));
                let b_key_number = Object.keys(columns).find(k => columns[k] === $(b).attr('data-column'));
                return a_key_number - b_key_number;
            });
            listHead.find('th').remove();
            listHead.append(listHeadItems);
            //重新排列內文
            let listBody = $('#sortableTable tbody tr').html(function() {
                let subList = $(this).children().sort(function(a, b) {
                    let a_key_number = Object.keys(columns).find(k => columns[k] === $(a).attr(
                        'data-column'));
                    let b_key_number = Object.keys(columns).find(k => columns[k] === $(b).attr(
                        'data-column'));
                    return a_key_number - b_key_number;
                });
                return subList;
            });
            listBody.find('#sortableTable tbody tr').remove();
            listBody.append(listBody);
        }
    </script>
@endsection
