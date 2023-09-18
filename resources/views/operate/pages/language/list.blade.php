@extends('operate.layout._Master')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2>{{ __('語系管理') }}</h2>
                            <div>
                                <a class="btn btn-sm btn-primary mr-2"
                                    href="{{ route('language_update', ['id' => 0]) }}?{{ request()->getQueryString() }}">
                                    {{ __('新增') }} </a>
                                <button type="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal"
                                    data-bs-target="#importModal">
                                    {{ __('匯入') }}
                                </button>
                                <button type="button" class="btn btn-sm btn-info mr-2" data-bs-toggle="modal"
                                    data-bs-target="#makeFileModal">
                                    {{ __('更新語系檔案') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        {{-- 搜尋START --}}
                        <form>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ $Model->Column_Title_Text['status'] }}</label>
                                        <select name="filter_status[]" class="select2bs5" multiple="multiple"
                                            style="width: 100%;">
                                            @foreach ($Model->statusText as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ in_array($key, (array) request()->get('filter_status')) ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ $Model->Column_Title_Text['type'] }}</label>
                                        <select name="filter_type[]" class="select2bs5" multiple="multiple"
                                            style="width: 100%;">
                                            @foreach ($Model->typeText as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ in_array($key, (array) request()->get('filter_type')) ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>{{ $Model->Column_Title_Text['lang_type'] }}</label>
                                        <select name="filter_lang_type[]" class="select2bs5" multiple="multiple"
                                            style="width: 100%;">
                                            @foreach ($Model->langTypeText as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ in_array($key, (array) request()->get('filter_lang_type')) ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>{{ __('文字搜尋') }}</label>
                                    <div class="form-group">
                                        <div class="input-group input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control" name="filter_text_key">
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
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="filter_text_value"
                                                value="{{ request()->get('filter_text_value') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>排序</label>
                                    <select class="form-control" name="order_by">
                                        <option value="id,desc">
                                            {{ __($Model->Column_Title_Text['id']) }}({{ __('反序') }})</option>
                                        <option value="id,asc">
                                            {{ __($Model->Column_Title_Text['id']) }}({{ __('正序') }})</option>
                                        <option value="created_at,desc">{{ __('建立時間') }}({{ __('反序') }})</option>
                                        <option value="created_at,asc">{{ __('建立時間') }}({{ __('正序') }})</option>
                                        <option value="updated_at,desc">{{ __('更新時間') }}({{ __('反序') }})</option>
                                        <option value="updated_at,asc">{{ __('更新時間') }}({{ __('正序') }})</option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary">{{ __('搜尋') }}</button>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ request()->url() }}">{{ __('取消') }}</a>
                                        <a class="btn btn-warning"
                                            href="{{ route('user_export') }}?{{ request()->getQueryString() }}">{{ __('匯出') }}</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- 搜尋END --}}

                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <button id="btnDeleteBatch"
                                            class="btn btn-sm btn-danger">{{ __('勾選刪除') }}</button>
                                        <button class="btn btn-sm btn-warning">{{ __('更新排序') }}</button>
                                    </div>
                                    {{-- <div>
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('user_export') }}?{{ request()->getQueryString() }}">{{ __('匯出') }}</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        {{-- 表格 --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __($Model->Column_Title_Text['id']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['text']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['tran_text']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['status']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['type']) }}</th>
                                        <th>{{ __($Model->Column_Title_Text['lang_type']) }}</th>
                                        <th>{{ __('操作') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form>
                                        @foreach ($Paginator->items() as $Item)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="form-check-input" name="id_array[]"
                                                        value="{{ $Item->id }}">
                                                    {{ $Item->id }}
                                                </td>
                                                <td>{{ $Item->text }}</td>
                                                <td>{{ $Item->tran_text }}</td>
                                                <td>{{ __($Model->statusText[$Item->status] ?? $Item->status) }}</td>
                                                <td>{{ __($Model->typeText[$Item->type] ?? $Item->type) }}</td>
                                                <td>{{ __($Model->langTypeText[$Item->lang_type] ?? $Item->lang_type) }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="/operate/language/{{ $Item->id }}?{{ request()->getQueryString() }}">{{ __('編輯') }}</a>
                                                    <button class="btn btn-sm btn-danger" type="button"
                                                        onclick="postForm('/operate/language/del?{{ request()->getQueryString() }}',{
                                                                            'id_array[]':{{ $Item->id }},
                                                                            _token:'{{ csrf_token() }}'
                                                                            })">{{ __('刪除') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>

                        @include('/operate/include/_PaginatorList')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('Modal')
    <!-- 彈出視窗 -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user_import') }}" method="post" enctype="multipart/form-data">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('關閉') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('送出') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="makeFileModal" tabindex="-1" data-toggle="makeFileModal" role="dialog" aria-labelledby="makeFileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('language_makeFile') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="makeFileModalLabel">{{ __('更新語系檔案') }}</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 class="card-subtitle mb-2">{{ __('是否要執行此操作？') }}</h6>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('關閉') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('確認') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('BodyJavascript')
    <script>
        //批次刪除
        $("#btnDeleteBatch").on("click", function() {
            var postArray = [];
            $("input[type=checkbox][name^='id_array']:checked").map(function() {
                let val = $(this).val();
                postArray["id_array[" + val + "]"] = val;
            });
            postArray["_token"] = '{{ csrf_token() }}';
            //送出
            postForm('/operate/language/del?{{ request()->getQueryString() }}', postArray)
        });
    </script>
@endsection
