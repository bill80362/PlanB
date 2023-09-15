@extends('views.admin.layout._MasterNoAuth')

@section('HeaderCSS')
@endsection

@section('Content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2>Oper管理系統</h2>
            </div>
            @auth('web')
                登入後才看到這一列<a href="/oper/Member_Data">進入後台</a>
            @endauth

            @auth('web_front')
                前台有登入，才看到的這一列
            @endauth



            @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif

            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="帳號" name="Account">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="密碼" name="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">登入</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection

@section('BodyJavascript')
@endsection
