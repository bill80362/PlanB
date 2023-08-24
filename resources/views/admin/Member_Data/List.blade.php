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
                            <div class="row">
                                <div class="col-lg-4">
                                    <label>狀態</label>
                                    <select class="form-control">
                                        <option>不限制</option>
                                        <option>正式</option>
                                        <option>非正式</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label>文字搜尋</label>
                                    <div class="form-group">
                                        <div class="input-group input-group">
                                            <div class="input-group-prepend">
                                                <select class="form-control">
                                                    <option>不限制</option>
                                                    <option>姓名</option>
                                                    <option>ID</option>
                                                    <option>手機</option>
                                                    <option>Email</option>
                                                    <option>地址</option>
                                                </select>
                                            </div>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>排序</label>
                                    <select class="form-control">
                                        <option>建立時間(反)</option>
                                        <option>建立時間(正)</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label></label>
                                    <button class="btn btn-primary">搜尋</button>
                                    <button class="btn btn-secondary">取消</button>
                                </div>
                            </div>
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
                                                               href="/Member_Data/{{$Item->ID}}">編輯</a>
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

@endsection
