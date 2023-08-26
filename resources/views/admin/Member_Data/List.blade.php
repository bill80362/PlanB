@extends('admin.layout._Master')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">會員管理</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">B計畫</a></li>
                        <li class="breadcrumb-item active">會員管理</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            {{--搜尋START--}}
                            <form>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>{{$Model->Column_Title_Text["Formal_Flag"]}}</label>
                                            <select name="Filter_Formal_Flag[]" class="select2bs4" multiple="multiple"
                                                    style="width: 100%;">
                                                @foreach ($Model->Formal_Flag_Text as $key => $value)
                                                    <option value="{{$key}}" {{in_array($key,(array)request()->get("Filter_Formal_Flag"))?"selected":""}} >{{$value}}</option>
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

                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <button class="btn btn-sm btn-warning">全選</button>
                                                <button class="btn btn-sm btn-warning">取消</button>
                                                <button class="btn btn-sm btn-danger">勾選刪除</button>
                                                <button class="btn btn-sm btn-danger">更新排序</button>
                                            </div>
                                            <div class="card-tools">
                                                <a class="btn btn-sm btn-primary" href="/Member_Data/0">新增</a>
                                                <button class="btn btn-sm btn-warning">匯入</button>
                                                <button class="btn btn-sm btn-warning">匯出</button>
                                            </div>
                                        </div>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
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
                                                @foreach ($Paginator->items() as $Item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="form-check-input"
                                                                   value="{{$Item->ID}}">
                                                            {{$Item->ID}}
                                                        </td>
                                                        <td>
                                                            <input class="form-control form-control-sm" type="text"
                                                                   style="width: 50px;" name="Order_No[{{$Item->ID}}]"
                                                                   value="">
                                                        </td>
                                                        <td>{{$Item->Name}}</td>
                                                        <td>{{$Item->Birthday}}</td>
                                                        <td>{{$Item->Cellphone}}</td>
                                                        <td>{{$Item->Email}}</td>
                                                        <td>{{$Item->Formal_Flag_Text[$Item->Formal_Flag]}}</td>
                                                        <td>
                                                            <a class="btn btn-xs btn-primary"
                                                               href="/Member_Data/{{$Item->ID}}?{{request()->getQueryString()}}">編輯</a>
                                                            <a class="btn btn-xs btn-danger" type="button">刪除</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
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
