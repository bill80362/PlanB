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
                        <h2>{{ __('操作紀錄') }} {{ __('列表') }}</h2>
                    </div>
                </div>
                <div class="white_card_body">
                    @include('/operate/components/alert/error_message')
                    {{--搜尋START--}}
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>{{__("文字搜尋")}}</label>
                                <div class="form-group">
                                    <div class="input-group input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="filter_text_key">
                                                <option value="">{{__("不限制")}}</option>
                                                <option value="old_values" {{request()->get("filter_text_key")=="old_values"?"selected":""}}>{{__($Model->Column_Title_Text["old_values"])}}</option>
                                                <option value="new_values" {{request()->get("filter_text_key")=="new_values"?"selected":""}}>{{__($Model->Column_Title_Text["new_values"])}}</option>
                                                <option value="url" {{request()->get("filter_text_key")=="url"?"selected":""}}>{{__($Model->Column_Title_Text["url"])}}</option>
                                                <option value="event" {{request()->get("filter_text_key")=="url"?"selected":""}}>{{__($Model->Column_Title_Text["event"])}}</option>
                                                <option value="tags" {{request()->get("filter_text_key")=="url"?"selected":""}}>{{__($Model->Column_Title_Text["tags"])}}</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="filter_text_value" value="{{request()->get("filter_text_value")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>{{__("排序")}}</label>
                                <select class="form-control" name="order_by">
                                    <option value="id,desc">{{__($Model->Column_Title_Text["id"])}}({{__("反序")}})</option>
                                    <option value="id,asc">{{__($Model->Column_Title_Text["id"])}}({{__("正序")}})</option>
                                    <option value="created_at,desc">{{__("建立時間")}}({{__("反序")}})</option>
                                    <option value="created_at,asc">{{__("建立時間")}}({{__("正序")}})</option>
                                    <option value="updated_at,desc">{{__("更新時間")}}({{__("反序")}})</option>
                                    <option value="updated_at,asc">{{__("更新時間")}}({{__("正序")}})</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary">{{__("搜尋")}}</button>
                                    <a class="btn btn-sm btn-secondary" href="{{request()->url()}}">{{__("取消")}}</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--搜尋END--}}

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>

                                </div>
                                <div>
                                    <a class="btn btn-sm btn-warning" href="{{route("audit_export")}}?{{request()->getQueryString()}}">{{__("匯出")}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--表格--}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{__($Model->Column_Title_Text["id"])}}</th>
                                <th>{{__($Model->Column_Title_Text["tags"])}}</th>
                                <th>{{__($Model->Column_Title_Text["event"])}}</th>
                                <th>{{__($Model->Column_Title_Text["url"])}}</th>
                                <th>{{__($Model->Column_Title_Text["old_values"])}}</th>
                                <th>{{__($Model->Column_Title_Text["new_values"])}}</th>
                                <th>{{__($Model->Column_Title_Text["ip_address"])}}</th>
                                <th>{{__($Model->Column_Title_Text["user_agent"])}}</th>
                                <th>{{__($Model->Column_Title_Text["created_at"])}}</th>
                                <th>{{__("修改人")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($Paginator->items() as $Item)
                                    <tr>
                                        <td>{{$Item->id}}</td>
                                        <td>{{$Item->tags}}</td>
                                        <td>{{$Item->event}}</td>
                                        <td>{{$Item->url}}</td>
                                        <td>{{collect($Item->old_values)->toJson()}}</td>
                                        <td>{{collect($Item->new_values)->toJson()}}</td>
                                        <td>{{$Item->ip_address}}</td>
                                        <td>{{$Item->user_agent}}</td>
                                        <td>{{$Item->created_at->toDateTimeString()}}</td>
                                        <td>{{$Item->user->name}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @include("/operate/include/_PaginatorList")
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('Modal')
    <!-- 彈出視窗 -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route("user_import")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">匯入新增</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <h6 class="card-subtitle mb-2">請上傳Excel檔案</h6>
                        <div class=" mb-0">
                            <input type="file" class="" name="file">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary">送出</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection

@section('BodyJavascript')
<script>
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
