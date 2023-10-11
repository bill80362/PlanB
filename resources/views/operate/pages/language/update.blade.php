@extends('operate.layout._Empty')

@section('HeaderCSS')
@endsection

@section('Content')
    {{--  --}}
    <div class="container-fluid p-0 ">
        <!-- page Content  -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card">
                    <div class="white_card_header">
                        <div class="d-flex align-items-center justify-content-between">
                            {{-- @include('/operate/components/title/page_title') --}}
                            <h2> {{ __('語系管理') }} {{ $data->id ? __('修改') : __('新增') }}</h2>

                            @can('language_delete')
                                @if ($data->id)
                                    <div class="btn-group ms-2">
                                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-more-alt"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item" href="##">
                                                儲存並複製
                                            </a> --}}
                                            {{-- <a class="dropdown-item" href="##">
                                                開啟預覽頁
                                            </a> --}}
                                            <a class="dropdown-item" id="delBtn" href="javascript:void(0)">
                                                刪除
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endcan
                            <div class="btn-group ms-2">
                                <a class="btn btn-light"
                                    href="{{ route('language_list') }}?{{ request()->getQueryString() }}">
                                    {{ __('回總覽') }}
                                </a>
                            </div>
                            <div class="btn-group ms-2">
                                <button class="btn btn-primary" id="saveBtn">
                                    {{ __('儲存') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="subForm">
                        <div class="white_card_body">

                            <div class="row">
                                @include('/operate/components/alert/error_message')
                                <div class="col-12 col-xl-6 mb-6">
                                    <div class="card mb-3 card-detail border-0">
                                        {{-- <div class="card-header border-0">
                                            <h5 class="card-title">商品基本資料</h5>
                                        </div> --}}
                                        <div class="card-body">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="lang_type" value="{{ $data->lang_type }}">

                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __('名稱') }}</label>
                                                <div class="col-12 col-sm-9">
                                                    <textarea {{ $data->id ? 'disabled' : '' }} name="text" class="form-control" rows="3">{{ $data->text }}</textarea>
                                                    @if ($data->id)
                                                        <input type="hidden" name="text" value="{{ $data->text }}">
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __('翻譯後名稱') }}({{ $langTypeText[$data->lang_type] }})</label>
                                                <div class="col-12 col-sm-9">
                                                    <textarea class="form-control" name="tran_text" rows="3">{{ $data->tran_text }}</textarea>
                                                </div>
                                            </div>


                                            @foreach ($otherLangTypeText as $key => $value)
                                                <div class="row mb-3">
                                                    <input type="hidden" name="else_langTypes[]"
                                                        value="{{ $elseDatas[$key]['lang_type'] }}">
                                                    <label for=""
                                                        class="col-12 col-sm-3 col-form-label pt-0">{{ __('翻譯後名稱') }}({{ $value }})</label>
                                                    <div class="col-12 col-sm-9">
                                                        <textarea class="form-control" name="else_trans[]" rows="3">{{ $elseDatas[$key]['tran_text'] }}</textarea>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 mb-3">
                                    <div class="card mb-3 card-detail border-0">
                                        <div class="card-body">
                                            {{-- <h5 class="card-title">基本設定</h5> --}}
                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __('備註') }}</label>
                                                <div class="col-12 col-sm-9">
                                                    <textarea class="form-control" name="memo" rows="3">{{ $data->memo }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for=""
                                                    class="col-12 col-sm-3 col-form-label pt-0">{{ __('相關網址') }}</label>
                                                <div class="col-12 col-sm-9">
                                                    @foreach ($urlMaps as $urlMaps)
                                                        <div>
                                                            {{ $urlMaps['url'] }}
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex align-items-center justify-content-end">
                                    <div class="btn-group ms-2">
                                        <a href="{{ route('language_list') }}?{{ request()->getQueryString() }}"
                                            class="btn btn-muted mx-2">{{ __('回總覽') }}</a>
                                    </div>
                                    <div class="btn-group ms-2">
                                        <button type="submit" class="btn btn-primary">{{ __('儲存') }}</button>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    {{--  --}}
@endsection

@section('BodyJavascript')
    <script>
        let saveBtn = document.getElementById("saveBtn");
        saveBtn.onclick = function() {
            document.getElementById("subForm").submit();
        }

        let delBtn = document.getElementById("delBtn");
        delBtn.onclick = function() {
            let yes = confirm('你確定嗎？');
            let data = @json($data);
            let id = data.id;
            if (yes) {
                var postArray = [];
                let val = $(this).val();
                postArray["id_array[" + id + "]"] = id;
                postArray["_token"] = '{{ csrf_token() }}';
                //送出
                postForm('/operate/language/del?{{ request()->getQueryString() }}', postArray)
            }
        }
    </script>
@endsection
