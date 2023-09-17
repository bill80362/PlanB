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
                        <h2>{{ __('管理人管理') }}</h2>
                        <div>
                            <a class="btn btn-sm btn-primary mr-2" href="{{route("user_update",["id"=>0])}}?{{request()->getQueryString()}}"> {{__("新增")}} </a>
                            <a class="btn btn-sm btn-warning mr-2" href="{{route("user_list")}}?{{request()->getQueryString()}}"> {{__("匯入")}} </a>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    {{--搜尋START--}}
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <label>文字搜尋</label>
                                <div class="form-group">
                                    <div class="input-group input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="filter_text_key">
                                                <option value="">不限制</option>
                                                <option value="name" {{request()->get("filter_text_key")=="name"?"selected":""}}>名稱</option>
                                                <option value="id" {{request()->get("filter_text_key")=="id"?"selected":""}}>ID</option>
                                                <option value="email" {{request()->get("filter_text_key")=="email"?"selected":""}}>Email</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="filter_text_value" value="{{request()->get("filter_text_value")}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>排序</label>
                                <select class="form-control" name="order_by">
                                    <option value="id,desc">ID(反)</option>
                                    <option value="id,asc">ID(正)</option>
                                    <option value="created_at,desc">建立時間(反)</option>
                                    <option value="created_at,asc">建立時間(正)</option>
                                    <option value="updated_at,desc">更新時間(反)</option>
                                    <option value="updated_at,asc">更新時間(正)</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                    <button class="btn btn-sm btn-primary">{{__("搜尋")}}</button>
                                    <a class="btn btn-sm btn-secondary" href="{{request()->url()}}">{{__("取消")}}</a>
{{--                                    <a class="btn btn-warning" href="{{route("user_export")}}?{{request()->getQueryString()}}">{{__("匯出")}}</a>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--搜尋END--}}

                    <div class="row mt-2">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <button id="btnDeleteBatch" class="btn btn-sm btn-danger">{{__("勾選刪除")}}</button>
                                    <button class="btn btn-sm btn-warning">{{__("更新排序")}}</button>
                                </div>
                                <div>
                                    <a class="btn btn-sm btn-warning" href="{{route("user_export")}}?{{request()->getQueryString()}}">{{__("匯出")}}</a>
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
                                <th>{{__($Model->Column_Title_Text["name"])}}</th>
                                <th>{{__($Model->Column_Title_Text["email"])}}</th>
                                <th>{{__($Model->Column_Title_Text["status"])}}</th>
                                <th>{{__("操作")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form>
                            @foreach ($Paginator->items() as $Item)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input" name="id_array[]"
                                               value="{{$Item->id}}">
                                        {{$Item->id}}
                                    </td>
                                    <td>{{$Item->name}}</td>
                                    <td>{{$Item->email}}</td>
                                    <td>{{__($Model->statusText[$Item->status]??$Item->status)}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="/operate/user/{{$Item->id}}?{{request()->getQueryString()}}"
                                        >{{__("編輯")}}</a>
                                        <button class="btn btn-sm btn-danger"
                                                type="button"
                                                onclick="postForm('/operate/user/del?{{request()->getQueryString()}}',{
                                                                            'id_array[]':{{$Item->id}},
                                                                            _token:'{{ csrf_token() }}'
                                                                            })"
                                        >{{__("刪除")}}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </form>
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

@section('BodyJavascript')
<script>
    //批次刪除
    $("#btnDeleteBatch").on("click",function(){
        var postArray = [];
        $("input[type=checkbox][name^='id_array']:checked").map(function(){
            // return $(this).val()
            let val = $(this).val();
            postArray["id_array["+val+"]"] = val;
        });
        postArray["_token"] = '{{ csrf_token() }}';
        //送出
        postForm('/operate/user/del?{{request()->getQueryString()}}',postArray)
    });
</script>
@endsection
