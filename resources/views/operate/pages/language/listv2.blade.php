@extends('operate.layout._Master')

@section('HeaderCSS')
@endsection


@section('Content')
    <section>
        <div class="container-fluid p-0 ">
            <!-- page Content  -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card">
                        <div class="white_card_header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>{{ __('語系管理') }}</h2>

                                <!-- Example single danger button -->
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-settings"></i> {{ __('處理') }}
                                    </button>
                                    <div class="dropdown-menu">
                                        @can('language_delete')
                                            <button type="button" id="btnDeleteBatch"
                                                class="dropdown-item">{{ __('勾選刪除') }}</button>
                                        @endcan
                                    </div>
                                </div>
                                <div class="btn-group me-2">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('匯入') }} / {{ __('匯出') }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#importModal">
                                            {{ __('匯入') }}
                                        </button>
                                        <a class="dropdown-item"
                                            href="{{ route('language_export') }}?{{ request()->getQueryString() }}">
                                            {{ __('匯出') }}
                                        </a>
                                    </div>
                                </div>
                                @can('language_create')
                                    <div class="btn-group">
                                        <a class="btn btn-primary"
                                            href="{{ route('language_update', ['id' => 0]) }}?{{ request()->getQueryString() }}">
                                            {{ __('新增') }}
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="white_card_body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group input-group" id="searchContnet">
                                                <div class="input-group-prepend">
                                                    <select class="form-select" name="filter_text_key"
                                                        data-target="#searchFilter">
                                                        <option value="">{{ __('不限制') }}</option>
                                                        <option value="text"
                                                            {{ request()->get('filter_text_key') == 'text' ? 'selected' : '' }}>
                                                            {{ __('名稱') }}
                                                        </option>
                                                        <option value="tran_text"
                                                            {{ request()->get('filter_text_key') == 'tran_text' ? 'selected' : '' }}>
                                                            {{ __('翻譯後名稱') }}
                                                        </option>
                                                        <option value="memo"
                                                            {{ request()->get('filter_text_key') == 'memo' ? 'selected' : '' }}>
                                                            {{ __('備註') }}</option>
                                                        <option value="lang_url_map"
                                                            {{ request()->get('filter_text_key') == 'lang_url_map' ? 'selected' : '' }}>
                                                            {{ __('相關網址') }}</option>
                                                    </select>
                                                </div>
                                                <input type="text" class="form-control" name="filter_text_value"
                                                    value="{{ request()->get('filter_text_value') }}"
                                                    data-target="#searchString">
                                                <button class="btn btn-dark" type="submit" id="searchButton"><i
                                                        class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6 mb-3">
                                    <button class="btn btn-secondary slideFunc-toggle" data-target="#prodFilter"><ion-icon
                                            name="funnel-outline"></ion-icon>
                                        {{ __('篩選器') }}</button>
                                    <a href="{{ request()->url() }}">
                                        <button class="btn btn-muted">重置查詢</button>
                                    </a>

                                    <!-- modals ppup  -->
                                </div>
                                <div class="col-12">
                                    <p class="d-flex align-items-center flex-content-start fz-sm filter-string">
                                        <span class="text-muted me-2">篩選器：</span>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">上架狀態：上架 <i
                                                class="ti-close"></i></button>
                                        <button class="btn btn-secondary me-2 btn-sm rounded-pill px-3">上架區間狀態：進行中、未開始
                                            <i class="ti-close"></i></button>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table" id="sortableTable">
                                            <thead>
                                                <tr id="sortList">
                                                    @if (in_array('default_serial_number', $columns))
                                                        <th class="sortStyle ascStyle">{{ __('流水號') }}</th>
                                                    @endif

                                                    @if (in_array('text', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('text', $columns) }}">
                                                            {{ __($Model->Column_Title_Text['text']) }}</th>
                                                    @endif

                                                    @if (in_array('tran_text', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('tran_text', $columns) }}">
                                                            {{ __($Model->Column_Title_Text['tran_text']) }}</th>
                                                    @endif

                                                    @if (in_array('lang_type', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('lang_type', $columns) }}">
                                                            {{ __($Model->Column_Title_Text['lang_type']) }}</th>
                                                    @endif

                                                    @if (in_array('isUpdated', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('isUpdated', $columns) }}">
                                                            {{ __('是否已修改') }}
                                                        </th>
                                                    @endif

                                                    @if (in_array('updated_at', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('updated_at', $columns) }}">
                                                            {{ __($Model->Column_Title_Text['updated_at']) }}</th>
                                                    @endif

                                                    @if (in_array('created_at', $columns))
                                                        <th class="sortStyle unsortStyle"
                                                            data-sort="{{ array_search('created_at', $columns) }}">
                                                            {{ __($Model->Column_Title_Text['created_at']) }}</th>
                                                    @endif


                                                    @if (in_array('default_action', $columns))
                                                        <th class="text-end">
                                                            <button onclick="openToggle(this)"
                                                                class="btn btn-link slideFunc-toggle text-muted"
                                                                data-target="#listSetting"><i
                                                                    class="ti-settings"></i></button>
                                                        </th>
                                                    @endif


                                                </tr>
                                            </thead>
                                            <tbody id="sortListContent">
                                                <form>
                                                    @foreach ($Paginator->items() as $key => $Item)
                                                        <tr class="{{ $key % 2 == 0 ? 'bg-muted-light' : '' }}">
                                                            <td data-sort="0">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="id_array[]" value="{{ $Item->id }}">
                                                                {{ $key + 1 + ($Paginator->currentPage() - 1) * $Paginator->perPage() }}
                                                            </td>

                                                            @if (in_array('text', $columns))
                                                                <td data-sort="{{ array_search('text', $columns) }}">
                                                                    {{ $Item->text }}</td>
                                                            @endif

                                                            @if (in_array('tran_text', $columns))
                                                                <td data-sort="{{ array_search('tran_text', $columns) }}">
                                                                    {{ $Item->tran_text }}</td>
                                                            @endif

                                                            @if (in_array('lang_type', $columns))
                                                                <td data-sort="{{ array_search('lang_type', $columns) }}">
                                                                    {{ __($Model->langTypeText[$Item->lang_type] ?? $Item->lang_type) }}
                                                                </td>
                                                            @endif

                                                            @if (in_array('isUpdated', $columns))
                                                                <td data-sort="{{ array_search('isUpdated', $columns) }}">
                                                                    {{ $Item->isUpdated ? 'Ⅹ' : '√' }}</td>
                                                            @endif

                                                            @if (in_array('updated_at', $columns))
                                                                <td
                                                                    data-sort="{{ array_search('updated_at', $columns) }}">
                                                                    {{ $Item->updated_at }}</td>
                                                            @endif

                                                            @if (in_array('created_at', $columns))
                                                                <td
                                                                    data-sort="{{ array_search('created_at', $columns) }}">
                                                                    {{ $Item->created_at }}</td>
                                                            @endif
                                                            <td class="text-end">
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-light dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ti-more-alt"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        @can('language_update')
                                                                            <li><a class="dropdown-item"
                                                                                    href="/operate/language/{{ $Item->id }}?{{ request()->getQueryString() }}">{{ __('編輯') }}</a>
                                                                            </li>
                                                                        @endcan
                                                                        @can('language_delete')
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0)"
                                                                                    onclick="postForm('/operate/language/del?{{ request()->getQueryString() }}',{
                                                                                'id_array[]':{{ $Item->id }},
                                                                                '_token':'{{ csrf_token() }}'
                                                                                })">{{ __('刪除') }}</a>
                                                                            </li>
                                                                        @endcan
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </form>

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
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('language_import') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">{{ __('匯入新增') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="card-subtitle mb-2">{{ __('請上傳Excel檔案') }}</h6>
                        <div class=" mb-0">
                            <input type="file" class="" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('送出') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                        <div class="form-group mb-3">
                            <label>{{ __('是否已修改') }}</label>
                            <select name="filter_is_change[]" class="select2bs5" multiple="multiple"
                                style="width: 100%;">
                                @foreach ($Model->isChangeText as $key => $value)
                                    {{ $value }}
                                    <option value="{{ $key }}"
                                        {{ in_array($key, (array) request()->get('filter_is_change')) ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <input id="searchFilter" type="hidden" value="">
                <input id="searchString" type="hidden" value="">
            </div>
            <div class="slideFunc-footer d-flex justify-content-center px-3 py-3">
                <button type="reset" class="btn btn-muted mx-2">{{ __('清除篩選器') }}</button>
                <button type="submit" class="btn btn-primary mx-2">{{ __('套用篩選條件') }}</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="slideFunc-box" id="listSetting">
        <div class="slideFunc-content">
            <div class="slideFunc-header d-flex justify-content-between align-items-center px-3 py-3">
                <h5 class="slideFunc-title" id="listSettingTitle">{{ __('列表欄位調整') }}</h5>
                <button type="button" class="btn-close" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form action="/operate/language/list_column" method="POST">
                @csrf
                <div class="slideFunc-body px-3 py-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="list-group">
                                <div class="sort-item">

                                    @foreach ($lockTitles as $key => $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $key }}"
                                                    aria-label="Checkbox for following text input" checked disabled>
                                                <label class="form-check-label"
                                                    for="">{{ $value }}</label>
                                            </div>
                                            <i class="ti-lock "></i>
                                        </div>
                                    @endforeach



                                </div>
                                <div class="sort-item" id="sortGroup">
                
                                    @foreach ($titles as $key => $value)
                                        <div class="list-group-item d-flex flex-content-between align-items-center">
                                            <div class="form-check flex-fill">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $key }}" name="list[]"
                                                    aria-label="Checkbox for following text input"
                                                    {{ in_array($key, $columns) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="">{{ $value }}</label>
                                            </div>
                                            <i class="ti-align-justify"></i>
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

        function openToggle(thisTarget) {
            const data = $(thisTarget).attr('data-target')
            $(data).toggleClass('in-active')
        }
        // tableSort
        // console.log(@json($columns))

        // 處理排序
        $(document).ready(function() {
            updateTitlehandler()
            updatehandler();
        });

        function updateTitlehandler() {
            var list = $('#sortList');
            var listItems = list.find('th').sort(function(a, b) {
                return $(a).attr('data-sort') - $(b).attr('data-sort');
            });
            list.find('th').remove();
            list.append(listItems);
        }

        function updatehandler() {
            let list = $('#sortListContent tr').html(function() {
                let subList = $(this).children().sort(function(a, b) {
                    return $(a).attr('data-sort') - $(b).attr('data-sort');
                });
                return subList;

            });
            list.find('#sortListContent tr').remove();
            list.append(list);
        }


        new Sortable(document.getElementById('sortGroup'), {
            filter: '.in-fixed', // 'filtered' class is not draggable
            animation: 150,
            handle: '.ti-align-justify',
            ghostClass: 'bg-secondary-light'
        });
    </script>
@endsection
