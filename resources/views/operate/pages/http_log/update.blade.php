@extends('operate.layout._Empty')

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
                                        href="{{ route('http_log_list') }}?{{ request()->getQueryString() }}">
                                    </a>
                                    {{-- {{ __('管理人管理') }} {{ $data->id ? __('修改') : __('新增') }} --}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form method="post">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>{{ _('編號') }}:{{ $data->id }}</div>
                                                <div>{{ _('最後更新時間') }}:{{ $data->updated_at }}</div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group mb-3">
                                                        <label>{{ __('分類') }}</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->type }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>{{ __('主鍵') }}</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->primary_key }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>{{ __('網址') }}</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->url }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>{{ __('串接時間') }}</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->connect_time }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Http Code</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->status_code }}">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>{{ __('建立時間') }}</label>
                                                        <input type="text" disabled class="form-control" name="name"
                                                            value="{{ $data->created_at }}">
                                                    </div>
                                                </div>

                                                <div class="col-6">

                                                    <div class="form-group mb-3">
                                                        <label>Request</label>
                                                        <textarea disabled class="form-control" name="text" rows="7">{{ $data->request }}</textarea>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label>Response</label>
                                                        <textarea disabled class="form-control" name="text" rows="7">{{ $data->response }}</textarea>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            {{-- <button type="submit" class="btn btn-primary">送出</button> --}}
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
