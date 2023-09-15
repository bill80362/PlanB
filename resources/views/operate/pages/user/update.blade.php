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
                                <h2>
                                    <a class="btn btn-primary mr-2" href="{{route("user_list")}}?{{request()->getQueryString()}}"> < </a>
                                    {{ __('後台管理員') }} {{$Data->id?__('修改'):__('新增')}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>{{_("編號")}}:{{$Data->id}}</div>
                                                <div>{{_("最後更新時間")}}:{{$Data->updated_at}}</div>
                                            </div>
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
                                                <label>名稱</label>
                                                <input type="text" class="form-control" name="name" value="{{$Data->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label>密碼</label>
                                                <input type="password" class="form-control" name="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" value="{{$Data->email}}">
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



@endsection

@section('BodyJavascript')

@endsection
