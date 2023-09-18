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
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h2>
                                    <a class="btn btn-primary mr-2"
                                        href="{{ route('language_list') }}?{{ request()->getQueryString() }}">
                                        < </a>
                                            {{ __('語系管理') }} {{ $Data->id ? __('修改') : __('新增') }}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form method="post">
                            <input type="hidden" class="form-control" name="updated_at" value="{{ $Data->updated_at }}">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>{{ __('編號') }}:{{ $Data->id }}</div>
                                                <div>{{ __('最後更新時間') }}:{{ $Data->updated_at }}</div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                {{-- 錯誤訊息 --}}
                                                @include('/operate/components/alert/error_message')
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>{{ __('是否啟用') }}</label>
                                                        <div>
                                                            {{-- $Data->lang_type --}}
                                                            @foreach ($Model->statusText as $key => $item)
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="status" id="{{ $item }}"
                                                                        @checked($Data->status == $key)
                                                                        value="{{ $key }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $item }}">{{ $item }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>{{ __('語系') }}</label>
                                                        <div>
                                                            {{-- $Data->lang_type --}}
                                                            @foreach ($Model->langTypeText as $key => $item)
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="lang_type" id="{{ $item }}"
                                                                        @checked($Data->lang_type == $key)
                                                                        value="{{ $key }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $item }}">{{ $item }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ __('類型') }}</label>
                                                        <div>
                                                            {{-- $Data->type --}}
                                                            @foreach ($Model->typeText as $key => $item)
                                                                <div class="form-check form-check-inline mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        @checked($Data->type == $key) name="type"
                                                                        id="{{ $item }}"
                                                                        value="{{ $key }}">
                                                                    <label class="form-check-label"
                                                                        for="{{ $item }}">{{ $item }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    @php
                                                        // dd($Data->toArray());
                                                    @endphp

                                                    <div class="form-group mb-3">
                                                        <label>{{ __('名稱') }}</label>
                                                        <textarea class="form-control" name="text" rows="3">{{ $Data->text }}</textarea>

                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label>{{ __('翻譯後名稱') }}</label>
                                                        <textarea class="form-control" name="tran_text" rows="3">{{ $Data->tran_text }}</textarea>

                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label>{{ __('備註') }}</label>
                                                        <textarea class="form-control" name="memo" rows="3">{{ $Data->memo }}</textarea>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">送出</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('BodyJavascript')
@endsection
