@extends('admin.layout._Master')

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
                            <h3>{{ __('admin.member.list_title',["Attribute"=>"我是範本I am"]) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    {{--搜尋START--}}
                    <form>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>{{$Model->Column_Title_Text["Formal_Flag"]}}</label>
                                    <select name="Filter_Formal_Flag[]" class="select2bs5" multiple="multiple" style="width: 100%;">
                                        @foreach ($Model->Formal_Flag_Text as $key => $value)
                                            <option
                                                value="{{$key}}" {{in_array($key,(array)request()->get("Filter_Formal_Flag"))?"selected":""}} >{{$value}}</option>
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
                                            <select class="form-control" name="Filter_Text_Key">
                                                <option>不限制</option>
                                                <option value="Name">姓名</option>
                                                <option value="ID">ID</option>
                                                <option value="Cellphone">手機</option>
                                                <option value="Email">Email</option>
                                                <option value="Address">地址</option>
                                            </select>
                                        </div>
                                        <input type="text" class="form-control" name="Filter_Text_Value">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>排序</label>
                                <select class="form-control" name="Order_By">
                                    <option value="ID_DESC">建立時間(反)</option>
                                    <option value="ID_ASC">建立時間(正)</option>
                                    <option value="ID_DESC">ID(反)</option>
                                    <option value="ID_ASC">ID(正)</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>&nbsp;</label>
                                <div class="form-group">
                                    <button class="btn btn-primary">搜尋</button>
                                    <a class="btn btn-secondary" href="{{request()->url()}}">取消</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{--搜尋END--}}

                    {{--表格--}}
                    <div class="table-responsive m-b-30">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>排序</th>
                                <th>姓名</th>
                                <th>生日</th>
                                <th>手機</th>
                                <th>Email</th>
                                <th>狀態</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form>
                            @foreach ($Paginator->items() as $Item)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input"
                                               value="{{$Item->ID}}">
                                        {{$Item->ID}}
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text"
                                               style="width: 50px;"
                                               name="Order_No[{{$Item->ID}}]"
                                               value="">
                                    </td>
                                    <td>{{$Item->Name}}</td>
                                    <td>{{$Item->Birthday}}</td>
                                    <td>{{$Item->Cellphone}}</td>
                                    <td>{{$Item->Email}}</td>
                                    <td>{{$Item->Formal_Flag_Text[$Item->Formal_Flag]}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                           href="/oper/Member_Data/{{$Item->ID}}?{{request()->getQueryString()}}"
                                        >編輯</a>
                                        <button class="btn btn-sm btn-danger"
                                                type="button"
                                                onclick="postForm('/oper/Member_Data/del?{{request()->getQueryString()}}',{
                                                                            'ID[]':{{$Item->ID}},
                                                                            _token:'{{ csrf_token() }}'
                                                                            })"
                                        >刪除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </form>
                            </tbody>
                        </table>
                    </div>

                    @include("/admin/include/_PaginatorList")
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('BodyJavascript')
    <script>

    </script>
@endsection
