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
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>{{ __('管理人管理') }} {{ __('操作紀錄') }}</h2>
                        <div>
                            <a class="btn btn-sm btn-primary mr-2" href="{{route("user_update",["id"=>0])}}?{{request()->getQueryString()}}"> {{__("新增")}} </a>
                            <button type="button" class="btn btn-sm btn-warning mr-2" data-bs-toggle="modal" data-bs-target="#importModal">
                                {{__("匯入")}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    @include('/operate/components/alert/error_message')
                    {{--表格--}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{__("編號")}}</th>
                                <th>{{__("標籤")}}</th>
                                <th>{{__("事件")}}</th>
                                <th>{{__("網址")}}</th>
                                <th>{{__("事件前")}}</th>
                                <th>{{__("事件後")}}</th>
                                <th>{{__("IP")}}</th>
                                <th>{{__("user_agent")}}</th>
                                <th>{{__("時間")}}</th>
                                <th>{{__("修改人")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form>
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
                                    <td>{{$Item->user?$Item->user->name:""}}</td>
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

@section('Modal')
    <!-- 彈出視窗 -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route("user_import")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">匯入新增</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
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
