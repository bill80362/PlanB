@extends('admin.layout._Master')

@section('HeaderCSS')

@endsection

@section('Content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <a class="btn btn-primary mr-2" href="/Member_Data?{{request()->getQueryString()}}"> < </a>
                        會員{{$Data->ID?"編輯":"新增"}}
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">B計畫</a></li>
                        <li class="breadcrumb-item active">會員管理</li>
                        <li class="breadcrumb-item active">會員{{$Data->ID?"編輯":"新增"}}</li>
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
                                <div class="col-12">
                                    <form method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                ID:{{$Data->ID}} , updated_at: {{$Data->updated_at}}
                                            </div>
                                            <div class="card-body">
                                                {{--錯誤訊息--}}
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <input type="hidden" class="form-control" name="updated_at" value="{{$Data->updated_at}}">
                                                <div class="form-group">
                                                    <label>會員編號</label>
                                                    <input type="text" class="form-control" name="MemberNum" value="{{$Data->MemberNum}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>會員登入帳號</label>
                                                    <input type="text" class="form-control" name="Login_Email" value="{{$Data->Login_Email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>會員登入密碼</label>
                                                    <input type="text" class="form-control" name="Login_Password" value="{{$Data->Login_Password}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>姓名</label>
                                                    <input type="text" class="form-control" name="Name" value="{{$Data->Name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>手機</label>
                                                    <input type="text" class="form-control" name="Cellphone" value="{{$Data->Cellphone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>電話</label>
                                                    <input type="text" class="form-control" name="Tel" value="{{$Data->Tel}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="Email" value="{{$Data->Email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>生日</label>
                                                    <input type="text" class="form-control" name="Birthday" value="{{$Data->Birthday}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Country_ID</label>
                                                    <input type="text" class="form-control" name="Country_ID" value="{{$Data->Country_ID}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>City_ID</label>
                                                    <input type="text" class="form-control" name="City_ID" value="{{$Data->City_ID}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Area_ID</label>
                                                    <input type="text" class="form-control" name="Area_ID" value="{{$Data->Area_ID}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Area_No1</label>
                                                    <input type="text" class="form-control" name="Area_No1" value="{{$Data->Area_No1}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Area_No2</label>
                                                    <input type="text" class="form-control" name="Area_No2" value="{{$Data->Area_No2}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="Address" value="{{$Data->Address}}">
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">送出</button>
                                            </div>

                                        </div>
                                    </form>
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
