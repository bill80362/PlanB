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

                                </div>
                                <div class="btn-group me-2">

                                </div>
                                <div class="btn-group">
                                    @can('pageContent_create')
                                        <a class="btn btn-primary"
                                            href="{{ route('page_content_update', ['id' => 0]) }}?{{ request()->getQueryString() }}">
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
                                                    @foreach ($Model->filterTextKey as $value)
                                                        <option value="{{ $value }}"
                                                            {{ request()->get('filter_text_key') == $value ? 'selected' : '' }}>
                                                            {{ __($Model->Column_Title_Text[$value]) }}</option>
                                                    @endforeach

                                                    @foreach ($Model->filterTextKeyCustom as $key => $value)
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
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter"><ion-icon
                                            name="funnel-outline"></ion-icon>
                                        {{ __('篩選器') }}</button>
                                    <a class="btn btn-muted" href="{{ request()->url() }}">{{ __('重置查詢') }}</a>
                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">
                                    <x-OperateFilterChosen :model="$Model"></x-OperateFilterChosen>
                                    {{--                                    @include("operate.components.filter.chosen") --}}
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr>
                                                    <th class="sortStyle" data-column="default_serial_number">
                                                        {{ __('default_serial_number') }}</th>
                                                    <x-OperateTh column="id" :model="$Model"></x-OperateTh>
                                                    <x-OperateTh column="lang_type" :model="$Model"></x-OperateTh>
                                                    <x-OperateTh column="page_name" :model="$Model"></x-OperateTh>
                                                    <x-OperateTh column="slug" :model="$Model"></x-OperateTh>
                                                    <x-OperateTh column="created_at" :model="$Model"></x-OperateTh>
                                                    <x-OperateTh column="updated_at" :model="$Model"></x-OperateTh>
                                                    {{-- <x-OperateTh column="updated_at" :model="$Model"></x-OperateTh> --}}
                                                    <th class="text-end" data-column="operate">
                                                        <button class="btn btn-link slideFunc-toggle text-muted"
                                                            data-target="#listSetting"><i class="ti-settings"></i></button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Paginator->items() as $index => $Item)
                                                    <tr class="{{ $index % 2 ? '' : 'bg-muted-light' }}">
                                                        <td class="border-0" data-column="default_serial_number">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="id_array[]" value="1"> {{ $index + 1 }}
                                                        </td>
                                                        <td class="border-0" data-column="id">{{ $Item->id }}</td>
                                                        <td class="border-0" data-column="lang_type">{{ $Item->lang_type }}
                                                        </td>
                                                        <td class="border-0" data-column="page_name">{{ $Item->page_name }}
                                                        </td>
                                                        <td class="border-0" data-column="slug">{{ $Item->slug }}</td>
                                                        <td class="border-0" data-column="created_at">
                                                            {{ $Item->created_at }}</td>
                                                        <td class="border-0" data-column="updated_at">
                                                            {{ $Item->updated_at }}</td>
                                                        <td class="border-0 text-end" data-column="operate">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-light dropdown-toggle"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ti-more-alt"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    @can('pageContent_update')
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('page_content_update', ['id' => $Item->id]) }}?{{ request()->getQueryString() }}">{{ __('編輯') }}</a>
                                                                        </li>
                                                                    @endcan

                                                                    {{-- <a target="_blank" class="dropdown-item"
                                                                        href="{{ route('page_content_audit', ['id' => $Item->id]) }}?{{ request()->getQueryString() }}">{{ __('紀錄') }}</a> --}}
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
                            @foreach ($Model->filterTemplate as $column => $setting)
                                <x-OperateFilterDiv :column="$column" :model="$Model"
                                    :setting="$setting"></x-OperateFilterDiv>
                            @endforeach
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

    <div class="slideFunc-box" id="listSetting">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="listSettingTitle">{{ __('列表欄位調整') }}</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form action="{{ route('page_content_saveListColumn') }}" method="POST">
                @csrf
                <div class="slideFunc-body px-3 py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group">
                                <div class="sort-item">
                                    @foreach ($TableSetting['lockColumn'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}"
                                                    aria-label="Checkbox for following text input" checked disabled>
                                                <label class="form-check-label"
                                                    for="">{{ __($Model->Column_Title_Text[$value] ?? $value) }}</label>
                                            </div>
                                            <i class="ti-lock "></i>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="sort-item" id="sortGroup">
                                    @foreach ($TableSetting['canUseColumn'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}" name="list[]"
                                                    aria-label="Checkbox for following text input"
                                                    {{ in_array($value, $columns) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">{{ __($Model->Column_Title_Text[$value] ?? $value) }}</label>
                                            </div>
                                            <i class="ti-align-justify"></i>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="sort-item">
                                    @foreach ($TableSetting['lockColumnTail'] as $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value }}"
                                                    aria-label="Checkbox for following text input" checked disabled>
                                                <label class="form-check-label"
                                                    for="">{{ __($Model->Column_Title_Text[$value] ?? $value) }}</label>
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
